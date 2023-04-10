<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>What's the current day number?</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
  <!-- <link href="/css/pico.min.css" rel="stylesheet"> -->
  <style>
    html {
      margin:0;
      padding:0;
      /* background: #233400; */
      color:#FFF;
      font-family: 'Oswald', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    }
    body {
      margin:0;
      padding:0;
      /* background: linear-gradient(to top, #fff3, #0003); */
      animation: pulse 20s infinite;
    }
    .grid {
      display: grid;
      place-items: center;
      height:100vh;
      margin: 0 24px;
    }
    h1 { 
      font-size: clamp(2rem, 1.273rem + 3.64vw, 4rem);
      line-height: 1.1;
      margin: 0;
    }
    @keyframes pulse {
      0%, 100% {
        background: #271a4c;
      }
      50% {
        background: #7a60f4;
      }
  }

  </style>
</head>
<body>
  <!-- 2023-01-07 // updated with ChatGPT-generated JavaScript -->
<div class="grid">
  <div>
    <h1 id="output"></h1>
  </div>
</div>
</body>
<script>
// generated with Chat GPT on 2023-01-07
// get the current date and time
const now = new Date();

// get the timezone offset in minutes
const timezoneOffset = now.getTimezoneOffset();

// calculate the local time by adding the offset to UTC time
const localTime = new Date(now.getTime() - timezoneOffset * 60000);

// check if DST is in effect for the local time
const isDST = localTime.getTimezoneOffset() < timezoneOffset;

// get the day of the year
const startOfYear = new Date(localTime.getFullYear(), 0, 0);
const diff = localTime - startOfYear;
const dayOfYear = Math.floor(diff / (1000 * 60 * 60 * 24));

// determine the suffix for the day of the year
let suffix;
if (dayOfYear % 10 === 1 && dayOfYear !== 11) {
  suffix = "st";
} else if (dayOfYear % 10 === 2 && dayOfYear !== 12) {
  suffix = "nd";
} else if (dayOfYear % 10 === 3 && dayOfYear !== 13) {
  suffix = "rd";
} else {
  suffix = "th";
}

// display the day of the year with suffix
const output = document.getElementById("output");
output.textContent = `Today is the ${dayOfYear}${suffix} day of the year${isDST ? ' (DST)' : ''}.`;

// document.write("Today is day " + (dayOfYear + 1) + " of " + year + " in your timezone.");
// document.getElementById("boo").innerHTML = (dayOfYear + 1 + suffix);

// convert the day of the year to a hexadecimal value
const hexValue = dayOfYear.toString(16);

// pad the hexadecimal value with leading zeros if necessary
const paddedHexValue = hexValue.padStart(3, "0");

// generate a hex code based on the hexadecimal value
const hexCode = "#" + paddedHexValue;

// set the background color to the generated hex code
document.body.style.backgroundColor = hexCode;

</script>
</html>

<!-- FROM CHATGPT:
To get the current numeric day of the year in your timezone using PHP, you can use the date function with the format parameter set to "z":

$day_of_year = date("z");

This will return the current day of the year, where 0 is January 1st and 365 (or 364 in a leap year) is December 31st.

You can also specify a timezone using the date_default_timezone_set function before calling the date function:

date_default_timezone_set('America/New_York');
$day_of_year = date("z");

Keep in mind that this will only work if your server's timezone is correctly configured. You can check the current timezone by using the date_default_timezone_get function:

$timezone = date_default_timezone_get();
-->