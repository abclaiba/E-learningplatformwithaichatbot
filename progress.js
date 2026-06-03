/*
 * EduLearn lecture progress tracker.
 * Drop into any lecture page with:
 *   <script src="progress.js" data-course="Web Development"></script>
 * It numbers the .video-card elements 1..N, adds a "Mark as Complete"
 * toggle to each, shows a progress bar, and syncs with the server.
 */
(function () {
    var thisScript = document.currentScript;
    var course = thisScript ? thisScript.getAttribute('data-course') : '';
    if (!course) return;

    document.addEventListener('DOMContentLoaded', function () {

        var cards = Array.prototype.slice.call(
            document.querySelectorAll('.video-card')
        );
        if (!cards.length) return;

        var total = cards.length;

        // ---- Build the progress bar ----------------------------------
        var container = document.querySelector('.video-container');
        var bar = document.createElement('div');
        bar.style.cssText =
            'max-width:1200px;margin:0 auto 30px auto;background:#fff;' +
            'padding:20px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);';
        bar.innerHTML =
            '<div style="display:flex;justify-content:space-between;margin-bottom:10px;font-weight:bold;color:#1a237e;">' +
            '<span>Your Progress</span><span id="progress-label">0 / ' + total + ' (0%)</span></div>' +
            '<div style="background:#e8eaf6;border-radius:20px;height:18px;overflow:hidden;">' +
            '<div id="progress-fill" style="height:100%;width:0%;background:linear-gradient(135deg,#4f8ef7,#7c3aed);transition:width .3s;"></div>' +
            '</div>';
        if (container && container.parentNode) {
            container.parentNode.insertBefore(bar, container);
        }

        var fill  = bar.querySelector('#progress-fill');
        var label = bar.querySelector('#progress-label');

        function render(completedCount) {
            var pct = Math.round((completedCount / total) * 100);
            fill.style.width = pct + '%';
            label.textContent = completedCount + ' / ' + total + ' (' + pct + '%)';
        }

        function countDone() {
            return cards.filter(function (c) { return c.dataset.done === '1'; }).length;
        }

        // ---- Add a toggle button to each card ------------------------
        cards.forEach(function (card, idx) {
            var lectureNo = idx + 1;
            card.dataset.lectureNo = lectureNo;
            card.dataset.done = '0';

            var info = card.querySelector('.video-info') || card;

            var btn = document.createElement('button');
            btn.type = 'button';
            btn.style.cssText =
                'margin-top:12px;width:100%;padding:10px;border:none;border-radius:6px;' +
                'cursor:pointer;font-weight:bold;color:#fff;background:#2563eb;';
            btn.textContent = 'Mark as Complete';
            info.appendChild(btn);

            function paint() {
                if (card.dataset.done === '1') {
                    btn.textContent = '✓ Completed';
                    btn.style.background = '#16a34a';
                } else {
                    btn.textContent = 'Mark as Complete';
                    btn.style.background = '#2563eb';
                }
            }
            card._paint = paint;

            btn.addEventListener('click', function () {
                var makeDone = card.dataset.done !== '1';
                btn.disabled = true;

                var body = new URLSearchParams();
                body.append('course_name', course);
                body.append('lecture_no', lectureNo);
                body.append('action', makeDone ? 'complete' : 'uncomplete');

                fetch('mark_complete.php', { method: 'POST', body: body })
                    .then(function (r) { return r.json(); })
                    .then(function (data) {
                        btn.disabled = false;
                        if (!data.ok) {
                            alert('Could not save progress. Please log in again.');
                            return;
                        }
                        card.dataset.done = makeDone ? '1' : '0';
                        paint();
                        render(data.completed_count);
                    })
                    .catch(function () {
                        btn.disabled = false;
                        alert('Network error while saving progress.');
                    });
            });
        });

        // ---- Load existing progress ----------------------------------
        fetch('get_progress.php?course_name=' + encodeURIComponent(course))
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.ok && data.completed) {
                    data.completed.forEach(function (no) {
                        var card = cards[no - 1];
                        if (card) { card.dataset.done = '1'; card._paint(); }
                    });
                }
                render(countDone());
            })
            .catch(function () { render(0); });
    });
})();
