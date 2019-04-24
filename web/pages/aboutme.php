<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="About Me" content="width=device-width, initial-scale=1">
        <title>About Me</title>
        <meta name = "description" content="About Jonathan Carlson">
        <link rel="stylesheet" href="styles/normalize.css">
        <link id="styles" rel="stylesheet" href="/styles/main.css">
    </head>
    
    <body>
        <div class="align">
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header.php'; ?>
            </header>
        </div>
        
        <div class="align">
            <main>
                <h2>CS313 Web Engineering II</h2>
                <h3>About Me:</h3>
                <p>
                    I grew up in Austin Texas and graduated high school in 1999. I am the
                    youngest of 4 children, who all attended BYU-Idaho on campus. I decided to
                    follow in my sibling's footsteps and I obtained a degree in organizational 
                    communication from 1999 - 2005. From 2000 - 2002 I served a mission in  Moscow Russia. I met my wife while attending school and we moved to 
                    Madison Alabama just after graduation. 
                </p>
                
                <p>
                    My wife and I have 4 kids (13-girl, 10-boy, 5-boy, 1.5-girl). We enjoy
                    taking family vacations together with my wife's parents to the beach, 
                    the mountains, and even on cruises. On a typical day we take walks to 
                    the park, play frisbee, jump on the trampoline, and scream at eachother.
                </p>
                
                <p>
                    I worked in retail for a couple of years before starting a job with the
                    Social Security Administration in Birmingham. For 5 years I made a long 3-
                    hour round-trip commute every day before I finally transfered to the
                    office in Huntsville. I really don't remember what prompted it, but I
                    decided to self-learn Python. I quickly became hooked and my wife 
                    encouraged me to go back to school for software engineering. I really want
                    to go into Software engineering because I want to enjoy what I do rather
                    than have a "daily grind" career, which would be better than what I have
                    now. 
                </p>
                
                <div id="fixed">
                    <button type="button" onclick="document.getElementById('styles').href='/styles/main.css'">Style 1</button>
                    <button type="button" onclick="document.getElementById('styles').href='/styles/main2.css'">Style 2</button>
                </div>
            
            </main>  
            
            <footer>  
                <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
            </footer>
            
        </div>
    </body>
</html>