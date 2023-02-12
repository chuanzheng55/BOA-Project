import spacy
from spacy.matcher import Matcher

nlp = spacy.load("en_core_web_sm")
matcher = Matcher(nlp.vocab)


def classify_sentence(sentence):
    # Define the categories
    categories = ["technology", "sports", "politics"]

    # Define the patterns for each category
    technology_patterns = [
        [{"LOWER": "iphone"}, {"LOWER": "x"}],
        [{"LOWER": "google"}, {"LOWER": "glass"}]
    ]
    sports_patterns = [
        [{"LOWER": "nba"}],
        [{"LOWER": "tennis"}, {"LOWER": "world"}]
    ]
    politics_patterns = [
        [{"LOWER": "donald"}, {"LOWER": "trump"}],
        [{"LOWER": "white"}, {"LOWER": "house"}]
    ]

    # Add the patterns to the matcher
    for patterns, category in [(technology_patterns, "technology"),
                               (sports_patterns, "sports"),
                               (politics_patterns, "politics")]:
        for pattern in patterns:
            matcher.add(category,[pattern])

    # Process the sentence and classify it
    doc = nlp(sentence)
    matches = matcher(doc)
    categories_found = [doc.vocab.strings[match_id] for match_id, start, end in matches]
    if categories_found:
        return categories_found[0]
    else:
        return "other"


# Test the classify_sentence function
sentences = [
    "I just bought an iPhone X!",
    "Google Glass was a flop.",
    "The NBA playoffs are starting soon.",
    "The US Open is my favorite tennis tournament.",
    "Donald Trump is the current president of the United States.",
    "The White House is the official residence of the president."
]

for sentence in sentences:
    category = classify_sentence(sentence)
    print(f"{sentence} => {category}")