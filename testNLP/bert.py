import torch
from transformers import AutoTokenizer, AutoModel

# pre-trained BERT model
tokenizer = AutoTokenizer.from_pretrained("bert-base-uncased")
model = AutoModel.from_pretrained("bert-base-uncased")


# Define a function to obtain the embeddings of a text data using Hugging Face Transformers library.
def get_embeddings(text):
    input_ids = torch.tensor(tokenizer.encode(text)).unsqueeze(0)
    with torch.no_grad():
        last_hidden_states = model(input_ids)[0].mean(dim=1)
    return last_hidden_states


# Define a function to calculate cosine similarity between two embeddings
def cosine_similarity(a, b):
    return torch.nn.functional.cosine_similarity(a, b)


# Define the new ticket and existing tickets
new_user_description = "Application is updating forever"

existing_user_description = [
    "Application crashed", "Application won't start", "Application",
    "Application Update is taking longer than usual", "Application has gone offline",
    "Login token has expired. I need token renewed", "Application crashes randomly",
    "Application gives error sometimes when printing", "File missing for application start",
    "Application has gone offline", "User has installed unauthorized software onto computer",
    "Login token has expired. I need token renewed",
    "Application crashes randomly",
    "Application gives error sometimes when printing",
    "Inventory management and fulfillment service non-responsiv",
    "Web Page Images not loading",
    "Application crashes",
    "Trouble signing in to account",
    "Loading the Wrong page",
    "Application Update is taking longer than usual"
]

# Obtain the embeddings of the new_user_description and existing_user_description
new_ticket_embedding = get_embeddings(new_user_description)
existing_ticket_embeddings = [get_embeddings(ticket) for ticket in existing_user_description]

# Calculate the cosine similarity between the new_user_description and existing_user_description
similarities = [cosine_similarity(new_ticket_embedding, embedding).item() for embedding in existing_ticket_embeddings]

# Rank the existing tickets based on the similarity scores
ranking = sorted(range(len(similarities)), key=lambda i: similarities[i], reverse=True)

# Print the results
print("New Ticket:", new_user_description)
print("=" * 20)
for i, idx in enumerate(ranking):
    print(f"Rank {i + 1}: {existing_user_description[idx]} (Similarity: {similarities[idx]:.4f})")

    if similarities[idx] > .80:
        print(existing_user_description[idx])
        quit()
