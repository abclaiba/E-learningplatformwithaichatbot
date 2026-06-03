import { GoogleGenAI } from "@google/genai";
import express from "express";

const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// The client gets the API key from the environment variable `GEMINI_API_KEY`.
const ai = new GoogleGenAI({ apiKey: "AIzaSyBtKeQdjJ5yhDkGTR6XGq5pT0vVqsxV1Tc" });

app.post("/gemini", async (req, res) => {
    if (!req.body || !req.body.prompt) {
        return res.status(400).json({ error: "Missing 'prompt' in request body. Ensure Content-Type is application/json or application/x-www-form-urlencoded." });
    }
    const prompt = req.body.prompt;
    try {
        const response = await main(prompt);
        res.send(response);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

async function main(prompt) {
    const response = await ai.models.generateContent({
        model: "gemini-3-flash-preview",
        contents: prompt,
    });
    return response.text;
}

await main("what is html");
// listen on port 3000
app.listen(3000, () => {
    console.log("server is running on port 3000");
});