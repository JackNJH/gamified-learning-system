Directory Structure:

- Ticket Attachments:
    - uploads/tickets/{ticket_id}/attachment1.jpg
    - uploads/tickets/{ticket_id}/attachment2.jpg

- Profile Pictures:
    - uploads/profilepic/{user_id}/pic.jpg
    - uploads/profilepic/{user_id}/pic1.jpg

- Class Media:
    - Class Thumbnails: (Only 1 thumbnail per class)
        - uploads/classes/{class_id}/thumbnail1.jpg
        - uploads/classes/{class_id}/thumbnail2.jpg

    - Class Badges: (Only 1 badge per class)
        - uploads/classes/{class_id}/badge1.jpg
        - uploads/classes/{class_id}/badge2.jpg

    - Levels Media: 
        - uploads/classes/{class_id}/media/{chapter_id}/{level_id}/media1.jpg
        - uploads/classes/{class_id}/media/{chapter_id}/{level_id}/media2.jpg

    - Questions and Answers Media:
        - uploads/classes/{class_id}/media/{chapter_id}/{level_id}/{question_id}/
            - question1.jpg
            - question1_answer1.jpg
            - question1_answer2.jpg
