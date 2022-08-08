In this simple project i show how to send notify mail using Notification by queue also use database notificatoin. Let's see how to follow the steps

step 1# At first make a command for creating notification class <br>
 php artisan make:notification TestEnrollMent <br>
step 2# After that create notification table for database notification<br>
php artisan notification:table <br>
step 3# create queue table for implements queue <br>
php artisan queue:table <br>
step 4# After creating table than migrate all tables <br>
php artisan migrate <br>
step 5# Now implements ShouldQueue  <br>
step 6# After that write and customzed your code for receiving data from controller by object <br>
or you can follow my TestEnrollMent  notification class <br>
step 7# For database notification in TestEnrollMent notificaiton class add database notification in via method <br>
public function via($notifiable)  <br>
    {<br>
        return ['mail', 'database'];<br>
    }<br>
    <br>
step8# for save database notificaiton use toArray() to toDatabase() methods <br>
<br>
like =>
<br>
public function toArray($notifiable)<br>
    {<br>
        return [
           'body' => $this->enrollMentData['body'],
           'enrolmentText' => $this->enrollMentData['enrolmentText'],
           'time' => $this->enrollMentData['thankyou']
        ];<br>
    }<br>
 <br>
 step9#create controller class TestEnrollMentController for logic  <br>
 you can follow my TestEnrollMentController class <br> 
 we can send notification by two way by notify method or Notification class. <br>
 A Notifiable trait already use in user model class that's why we can use notify() method
    
