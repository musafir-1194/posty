## Laravel Setup 
1. laravel new posty
2. cd posty
3. Installing tailwindcss using npm inside root directoy
    >> npm install tailwindcss
4. Import modules of tailwindcss into app.css inside resources > css > app.css
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
5. Insert the below code inside webpack.mix.js
    ...
    require('tailwindcss'),
6. Run the below command inside root directoy
>> npm run dev
7. Created layouts.app, posts.index inside views.
8. Migrations
>> php artisan migrate
9. Add username to the users table 
>> php artisan make:migrate add_username_to_users_table
=> Will create a migrations and add the code to add new column
$table->string('username')
=> in the drop section add 
$table->dropColumn('username')
10. 