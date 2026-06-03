from flask import Flask, request, jsonify
from flask_cors import CORS
import g4f
import nest_asyncio

# Apply nest_asyncio to allow asyncio to run in Flask's thread if needed by g4f
nest_asyncio.apply()

app = Flask(__name__)
# Enable CORS for all routes, allowing your frontend to communicate with this backend
CORS(app)

@app.route('/api/chat', methods=['POST'])
def chat():
    try:
        data = request.get_json()
        if not data or 'message' not in data:
            return jsonify({'error': 'No message provided'}), 400
        
        user_message = data['message']
        
        # Use g4f to get a response from a free provider
        # It automatically picks an available provider that works without an API key
        response = g4f.ChatCompletion.create(
            model=g4f.models.gpt_35_turbo,
            messages=[{"role": "user", "content": user_message}],
        )
        
        return jsonify({'response': response})
        
    except Exception as e:
        print(f"Error: {str(e)}")
        return jsonify({'error': 'An error occurred while processing your request.', 'details': str(e)}), 500

if __name__ == '__main__':
    # Run the Flask app on port 5000
    app.run(debug=True, port=5000)