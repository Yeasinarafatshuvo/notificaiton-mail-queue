In this simple project i show how to send notify mail using Notification by queue also use database notificatoin. Let's see how to follow the steps

step 1# At first make a command for creating notification class <br>
 php artisan make:notification TestEnrollMent
step 2# After that create notification table for database notification
php artisan notification:table
step 3# create queue table for implements queue
php artisan queue:table
step 4# After creating table than migrate all tables
php artisan migrate
step 5# Now implements ShouldQueue 
step 6# After that write and customzed your code for receiving data from controller by object
or you can follow my TestEnrollMent  notification class
step 7# For database notification in TestEnrollMent notificaiton class add database notification in via method
public function via($notifiable)
    {
        return ['mail', 'database'];
    }
step8# for save database notificaiton use toArray() to toDatabase() methods

like =>
public function toArray($notifiable)
    {
        return [
           'body' => $this->enrollMentData['body'],
           'enrolmentText' => $this->enrollMentData['enrolmentText'],
           'time' => $this->enrollMentData['thankyou']
        ];
    }
 
 step9#create controller class TestEnrollMentController for logic 
 you can follow my TestEnrollMentController class 
 we can send notification by two way by notify method or Notification class.
 A Notifiable trait already use in user model class that's why we can use notify() method
    
