Course Management System V1.0:

Intrdouction:
International Courses System build using micro PHP framework and bootstrap :)

Requirments:
 - Signup/Login/Forget password pages
 - List Courses
 - Search for course by categories
 - Enroll to course Page
 - Mange subjects/categories/countries/cities/users pages (Admin)
 - Mange Couses/Quizes pages (Teacher)
 - List Quizes (student)
 - Submit quizes (student)
 - Review quizes answers (teachers)
 - Submited reviews to receive email notification

Roles & permissions:
1. Students
   - Can enroll to classes
   - Answer Quizes
   - download materials (pdf, docs ..etc)
2. Teachers
   - Create/edit new course
   - upload media and materials
   - Comment on lesson
   - Create/edit Quizes
3. Admins
   - Manage users
   - manage Subjects
   - manage categories
   - manage countries
   - manage cities
4. All
   - Login
   - Edit Profile
   - Change Password
   - upload profile Photo


Tech Used:
1. Bootstrap & jQuery for frontend
2. Admin Theme choosen from Themforset
3. Mysql database
4. PHP7
5. MVC (micro framework)
6. NPM for JS




Database:
Tables:
 - members
 - subjects
 - courses ( start data, end date) 
 - courses_enrollment
 - course_comments
 - quizes
 - quizes_answers
 - categories
 - country
 - city
