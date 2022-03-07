<h2><b>Installation Pre-requisites</b></h1>

- Git (any)
- Composer
- PHP 8.1.0^
- Node and npm

<h2><b>Installation</b></h1>
<p>Open terminal</p>

<p>
<i>Clone the repository.</i><br/>
<code>git clone https://github.com/johngeraldcayabyab/weather-forecast.git</code>
</p>

<p>
<i>Once the the repository is cloned, go to the repo directory and do the following commands.</i><br/>
<i>Install Composer dependencies.</i><br/>
<code>composer install</code>
</p>

<p>
<i>Install node modules.</i><br/>
<code>npm install</code>
</p>


<p>
<i>Once you installed the the composer and node dependencies, you need to copy the .env.example in the root of the repository and change the file name to .env</i><br/>
<i>Linux</i> <code>cp .env.example .env</code><br>
<i>Windows</i> <code>copy .env.example .env</code>
</p>

<p>
<i>Paste data in .env for openweather config along with openweather api key</i><br/>
<code>OPENWEATHER_API_KEY={PASTE_OPENWEATHER_API_KEY_HERE}</code><br/>
<code>OPENWEATHER_API_LANG=</code><br/>
<code>OPENWEATHER_API_DATE_FORMAT=</code><br/>
<code>OPENWEATHER_API_TIME_FORMAT=</code><br/>
<code>OPENWEATHER_API_DAY_FORMAT=</code>
</p>


<p>
<i>Clear the laravel cache to reflect the changes in .env</i><br/>
<code>php artisan config:clear</code><br>
<code>php artisan config:cache</code>
</p>


<p>
<i>Open two terminals to run the laravel server and the npm watcher</i><br/>
<i>In the first terminal run this, the default port would be :8000</i><br>
<code>php artisan serve</code><br>
<i>Run this on the second terminal</i><br/>
<code>npm run watch</code>
</p>

<p>
<i>Now go to your local browser and open the app in <a href="http://localhost:8000/">http://localhost:8000/</a></i><br/>
</p>

<h2><b>Get city forecast in terminal</b></h1>
<p>Open terminal</p>

<p>
<i>Run the artisan command to get a forecast of a city</i><br/>
<code>php artisan weather:get Tokyo</code>
</p>

<p>
<i>Run the artisan command to get a forecast of multiple cities (space delimited)</i><br/>
<code>php artisan weather:get Tokyo,Manila,Boston</code>
</p>


<hr>

<p><i>Some tips when pulling the project</i></p>
<p><i>Run this commands below everytime you pull from the main branch because changes are always made frequently.</i></p>

<code>npm install</code> (check if there are changes in package.json first)<br>
<code>composer install</code> (check if there are changes in composer.json first)<br>
<code>php artisan config:clear</code><br>
<code>composer dump-autoload</code><br>
<code>php artisan config:cache</code><br>
<code>php artisan migrate:fresh --seed</code> (Changes in the tables and seeds happens a lot in the master branch, this
also resets the database)<br>
