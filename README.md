# ElNadiTask
don't forget there is db file in this project 
the project in master ,creation route isn't working 
the routes ('/':Home page showing all student with CRUD ,'/edit/{id}':edit student,'/courses':show all courses,'/removeCourse/{id}'remove selected course ,'/show/{id}':show all student for certain course with there grade with total grade)
please insert data from phpmyadmin whrere student contain :

                  student info (FullName,BirthDate,level,levelId(foreign key)                                          
                  gradeItem info (Name , MaxDegree (max Degree for certain course) , type (type of course) , CourseID (foreign key refrence Course id)),StudentID (foreign key refrence student id) , StudentGrade (which is grade of student for this student ID)
                  course info (Name (course Name) , Description (contain description f this course ID ))

(Senario for inserting data)

if admin wanted to add student  from student table ,

add course form course but without MaxGrade , 

if admin wanted to add maxGrade and student garde and types for each course added it in gradeItem where you add Name , Maxdegree for this courseID ,type if it (midterm , oral , final , etc), and add course ID and student ID with its grade for this type of course )

project is made by blade frontend and laravel backend
