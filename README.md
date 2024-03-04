# Online chatting app

Used technologies:
```
1.  HTML
2.  CSS
3.  Javascript
4.  PHP
5.  MySQL (8.0)
```


### 'Home' page
Basic welcoming page with one paragraph and button that redirects to login page.

### 'Chat' page
Page that allows user to join/create rooms based on name and post messages. **This page is only visible for logged users.**

### 'Login' page
Basic login page with input for email and password. With wrong credentials, user friendly error will appear.

### 'Sign up' page
Basic registration page with input for name, email and password. Name and email must be unique. Datas are saved into database using procedures. With credentials already used for another, user friendly error will appear. Passwords are hashed.

-

### API
```js
Website contains REST API on URL website/api/{endpoint}
```

#### Endpoints
```js
1. /api/group/{name}
    - Shows all data os sent messages of specified group, if group is not specified, all groups will be returned. Includes id, message, sender and group name
2. /api/user/{name}
    - Returns all messages sent by specified user
3. /api/message/{text}
    - Returns all messages containing specified text sequence.
```

#### Website
Live website can be found [here](http://www.erik-bohac.site).