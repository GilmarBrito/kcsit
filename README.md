## About Test

Steps<br />
1 - git clone https://github.com/GilmarBrito/kcsit.git
<br />
2 - docker run --rm -v $(pwd):/app composer install
<br />
3 - Open bash project directory and type: docker-compose up
<br />
4 - Open browser: http://localhost/
<br />
5 - If necessary, run: docker-compose exec app php artisan migrate
<br />
I had some issues with my docker installation, so I lost one entire day.<br />
So, I write below some points.<br />
Improvement points:<br />
1 - I didn't make tests, because I didn't with Laravel 7 ever.<br />
2 - I did as Laravel way of life, but I don't like with some validations and other model things inner a Controller, because controllers should be work just to requests. To solve this issue, I'll implement Repository/Services pattern.<br />

My best regards!
