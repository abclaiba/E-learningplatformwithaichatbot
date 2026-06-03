import { GoogleGenAI } from "@google/genai";
import express from "express";

const app = express();

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.post("/chat", (req, res) => {

    if (!req.body || !req.body.prompt) {
        return res.status(400).json({ error: "Missing 'prompt' in request body. Ensure Content-Type is application/json or application/x-www-form-urlencoded." });
    }

    const prompt = req.body.prompt;

    console.log(prompt);

    res.json({
        message: "Received",
        prompt: prompt
    });

});

app.listen(3000, () => {
    console.log("Server running");
});