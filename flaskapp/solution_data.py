import json
import pymysql

# Connect to the database
conn = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    database='mydb'
)
text = "Application is crashed"
# Create a cursor
cursor = conn.cursor()

# Find the tickets that is resolved, and then get solution.
# Execute a SELECT statement
cursor.execute('SELECT solution_summary,user_description FROM ticketdatasheet WHERE Status = "resolved" ')

# Fetch all rows from the result
rows = cursor.fetchall()

# Loop through the rows and print the data
for row in rows:
    json_data = json.dumps(rows)

print(json_data)

# Close the cursor and connection
cursor.close()
conn.close()

## next step:  assuming the NLP can compare the similiarity betweent the new user_description with existing user_description,
# if the percentage is higher than 80% then it will pull the solution from the existing ticket.

# def solution(user_description):
#
#     return 0