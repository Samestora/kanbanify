# kanban-trello-style-app-php-mvc


<h3>Description</h3>

Manage your projects and tasks with this basic kanban web app tool

<ul>  
<li>Create a board - eg. "Programming"</li>
<li>Create lists within the board - eg. "Things To Do"</li>
<li>Create cards within lists - eg. "Learn laravel" or "Complete Blog Project"</li>
<li>Each card contains a description, checklist, and comments section</li>
<li>Create an account and login as a user</li>
<li>Remember me login option</li>
<li>Manage your boards, lists and cards</li>
</ul>


<h3>Technologies</h3>

<ul>
<li>HTML</li>
<li>CSS</li>
<li>Material Design Bootstrap 4</li> 
<li>JavaScript</li>    
<li>AJAX</li>  
<li>PHP7</li>
</ul>


<h3>Setup</h3>

<p>Run sql to create the database</p>
<p>Alter database connection information if needed in config file</p>
<p>The root folder name of this project on your machine must match $project_name variable in config file</p>
<p>You will need URL rewriting for this project to work</p>
<p>Sign in with either of the following accounts:</p>

<table>
<tr>
  <th>Username</th>
  <th>Password</th>
</tr>
<tr>
  <td>user1</td>
  <td>password</td>
</tr>
<tr>
  <td>admin</td>
  <td>admin</td>
 </tr>
</table>


<h3>Programming Features</h3>

<ul>
<li>Uses MVC architecture</li>  
<li>URL rewriting - htaccess and web.config files</li>  
<li>PHP routing</li>
<li>Ajax makes requests to php controller actions to perform CRUD operations</li>  
<li>Create an account and login (note: there is no user admin at this moment in time - you cannot delete or edit user accounts except through the database)</li>
<li>Uses cookies and sessions</li>
<li>Autoloading</li>
<li>JavaScript - event delegation and DOM manipulation</li>
<li>Uses PDO to interact with database</li>
</ul>


<h3>To Do</h3>
<li>Add additional features for cards - deadlines, task status, colour labels etc.</li>
<li>User collaboration and sharing of tasks</li>
<li>Save Changes and cancel button must do something (FIX)</li>
</ul>