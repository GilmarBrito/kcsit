## About Test

Steps<br />
1 - Clone this repository: git clone https://github.com/GilmarBrito/kcsittest.git
<br />
2 - Enter in project directory: cd kcsittest/
<br />
2 - Inner project directory, run these commands:
<br />
    docker-compose build; docker-compose up -d
<br />
    docker-compose run app bash /var/www/docker-compose/scripts/entry_point.sh
<br />
3 - After last command, open browser: http://localhost:8000
<br /><br /><br />
I had some issues with my docker installation, so I lost one entire day.<br />

So, I wrote below some points.<br />
Improvement points:<br />
1 - I didn't make tests, because I didn't with Laravel 7 ever.<br />
2 - I did as Laravel way of life, but I don't like with some validations and other model things inner a Controller, because controllers should be work just to requests. To solve this issue, I'll implement Repository/Services pattern.<br />

My best regards!

Note: I won't consider any new commit in the test, but I felt an obligation to correct the docker
script. Besides, I realized a missed ".env" file in my first commit, and two minor errors (both in
the blade template files).
