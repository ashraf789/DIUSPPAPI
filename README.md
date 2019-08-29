## DIUSPP API Documentation (Beta) `Version v1.0`
[![Build Status](https://travis-ci.org/slimphp/Slim.svg?branch=4.x)](https://travis-ci.org/slimphp/Slim)

###### API hosted site: https://lazycoderbd.000webhostapp.com/

**API key**
```
{
    ‘x-api-key’: ‘4c25ec36e94e5be888d4b029cab8febc’
}
```
### 1. Documentation

###### Read documentation
```
URL: __Site URL__/api/documentation/read/{project_id}
Request Type: GET
Example: https://lazycoderbd.000webhostapp.com/api/documentation/read/{project_id}
```
###### Add new documentation

```
URL: __Site URL__/api/documentation/add
Request Type: POST
Parameter: {
“documentation " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Update documentation
```
URL: __Site URL__/api/documentation/update/{id}
Request Type: PUT
Parameter: {
“documentation " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Delete documentation
```
URL: __Site URL__/api/documentation/delete/{id}
Request Type: DELETE 
```

### 2. Feature

###### Read Feature
```
URL: __Site URL__/api/feature/read/{project_id}
Request Type: GET
```
###### Add new Feature
```
URL: __Site URL__/api/feature/add
Request Type: POST
Parameter: {
“feature " : "",
" project_id " : "",
" user_id " : ""
}
```
##### Update Feature
```
URL: __Site URL__/api/feature/update/{id}
Request Type: PUT
Parameter: {
“feature " : "",
" project_id " : "",
" user_id " : ""
}
```
##### Delete Feature
```
URL: __Site URL__/api/feature/delete/{id}
Request Type: DELETE
```

### 3. Presentation
###### Read presentation
```
URL: __Site URL__/api/presentation/read/{project_id}
Request Type: GET
```
###### Add new presentation
``` 
URL: __Site URL__/api/presentation/add
Request Type: POST
Parameter: {
“presentation" : "",
" project_id " : "",
" user_id " : ""
}
```
###### Update presentation
```
URL: __Site URL__/api/presentation/update/{id}
Request Type: PUT
Parameter: {
“presentation " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Delete presentation
```
URL: __Site URL__/api/presentation/delete/{id}
Request Type: DELETE4. Proposal
```

###### Read proposal
```
URL: __Site URL__/api/proposal/read/{project_id}
Request Type: GET
```
###### Add new proposal
```
URL: __Site URL__/api/proposal/add
Request Type: POST
Parameter: {
“proposal " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Update proposal
```
URL: __Site URL__/api/proposal/update/{id}
Request Type: PUT
Parameter: {
“proposal " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Delete proposal
```
URL: __Site URL__/api/proposal/delete/{id}
Request Type: DELETE
```
### 5. Review

###### Read review
``` 
URL: __Site URL__/api/review/read/{project_id}
Request Type: GET
```
###### Add new review
```
URL: __Site URL__/api/review/add
Request Type: POST
Parameter: {
“review " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Update review
```
URL: __Site URL__/api/review/update/{id}
Request Type: PUT
Parameter: {
“review " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Delete review
```
URL: __Site URL__/api/review/delete/{id}
Request Type: DELETE
```
### 6. SRS

###### Read SRS
```
URL: __Site URL__/api/srs/read/{project_id}
Request Type: GET
```
###### Add new SRS
```
URL: __Site URL__/api/srs/add
Request Type: POST
Parameter: {
“srs " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Update SRS
```
URL: __Site URL__/api/srs/update/{id}
Request Type: PUT
Parameter: {
“srs " : "",
" project_id " : "",
" user_id " : ""
}
```
###### Delete SRS
```
URL: __Site URL__/api/srs/delete/{id}
Request Type: DELETE
```
### 7. Project
###### Read project by id
```
URL: __Site URL__/api/project/read/{id}
Request Type: GET
```
###### Read all project
```
URL: __Site URL__/api/project/read
Request Type: GET
```
###### Add new project
```
URL: __Site URL__/api/project/add
Request Type: POST
Parameter: {
“p_name" : ",
"p_group " : ",
" p_slug" : ",
"p_semester" : ",
" p_subject" : ",
" p_catagory " : ",
" p_language" : ",
" p_framework" : ",
"p_admin_id " : "
}
```
###### Update project
```
URL: __Site URL__/api/project/update/{id}
Request Type: PUT
Parameter: {
“p_name" : ",
"p_group " : ",
" p_slug" : ",
"p_semester" : ",
" p_subject" : ",
" p_catagory " : ",
" p_language" : ",
" p_framework" : ",
"p_admin_id " : "
}
```
###### Delete project
```
URL: __Site URL__/api/project/delete/{id}
Request Type: DELETE
```
### 8. Group

###### Read group by project ID
```
URL: __Site URL__/api/group/read/byprojectid/{project_id}
Request Type: GET
```
###### Read group by admin ID
```
URL: __Site URL__/api/group/read/byadminid/{admin_id}
Request Type: GET
```
###### Read all group
```
URL: __Site URL__/api/group/read
Request Type: GET
```
###### Add new group
```
URL: __Site URL__/api/group/add
Request Type: POST
Parameter: {
"requirement_engineer" : ",
"programer " : ",
"designer " : ",
"tester " : ",
"project_manager " : ",
"srs " : ",
"proposal " : ",
"documentation " : ",
"project_id" : ",
"admin_id " : "
}
```
###### Update group
```
URL: __Site URL__/api/group/update/{id}
Request Type: PUT
Parameter: {
"requirement_engineer" : ",
"programer " : ",
"designer " : ",
"tester " : ",
"project_manager " : ",
"srs " : ",
"proposal " : ",
"documentation " : ",
}
```
###### Delete group
```
URL: __Site URL__/api/group/delete/{id}
Request Type: DELETE
```
### 9. Authentication
###### Sign In
```
URL: __Site URL__/api/login
Request Type: POST
Parameter: {
" u_email " : "",
" u_password " : ""
}
```
###### Sign Up
```
URL: __Site URL__/api/signup
Request Type: POST
Parameter: {
"name" : "",
"email" : "",
"password" : "",
"remember_token" : ""
}
```

### Screenshot of API testing
###### Get method
<a href="https://imgur.com/WX8rr15"><img src="https://i.imgur.com/WX8rr15.png" title="source: imgur.com" /></a>
###### POST Method
<a href="https://imgur.com/LF2K6KH"><img src="https://i.imgur.com/LF2K6KH.png" title="source: imgur.com" /></a>
###### PUT Method
<a href="https://imgur.com/kTdZFJO"><img src="https://i.imgur.com/kTdZFJO.png" title="source: imgur.com" /></a>
###### DELETE Method
<a href="https://imgur.com/w1jMiqQ"><img src="https://i.imgur.com/w1jMiqQ.png" title="source: imgur.com" /></a>
### Some Common Mistake Error Screenshot
###### Forget to add x-api-key into header
<a href="https://imgur.com/r9aplZC"><img src="https://i.imgur.com/r9aplZC.png" title="source: imgur.com" /></a>
###### Invalid API key error
<a href="https://imgur.com/Qq1XRce"><img src="https://i.imgur.com/Qq1XRce.png" title="source: imgur.com" /></a>
###### Forget to add required parameter
<a href="https://imgur.com/yVSgx20"><img src="https://i.imgur.com/yVSgx20.png" title="source: imgur.com" /></a>
###### Invalid ID
<a href="https://imgur.com/B38KZX5"><img src="https://i.imgur.com/B38KZX5.png" title="source: imgur.com" /></a>
</br>

## License
This project is licensed under the MIT License - see the [License File](LICENSE) for details

