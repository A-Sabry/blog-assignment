project requirements
---------------------
- PHP >= 7.2

project installation 
-------------------------------
- git clone https://github.com/A-Sabry/blog-assignment.git

- Composer install
 
- php artisan migrate

-------------------------------
API
------------------------------ 
 User signup
------------------------------

- url : {domain}/api/register

- method : post

- parameters :email, password, name

- return user name and token

-------------------------------------------

 User login
-------------------------------------------
- url : {domain}/api/login

- method : post

- parameters :email, password

- return user token

-----------------------------------------

 User create tweet 
----------------------------------------
- url : {domain}/api/tweet

- method : post

- parameters :text, api_token

------------------------------------
User delete tweet
-----------------------------------
- url : {domain}/api/tweet/{id}
 
- method : delete

- parameters : api_token

----------------------------------
User follow another user
----------------------------------
- url : {domain}/api/follow/{id}
 
- method : post

- parameters : api_token

------------------------------------
User time line
-------------------------------------------
- url : {domain}/api/timeLine?api_token=

- method : get

Get all tweets
-------------------------------------------
- url : {domain}/api/tweet?api_token=

- method : get

Get tweet by id
------------------------------------------
- url : {domain}/api/tweet/{id}?api_token

- method : get



