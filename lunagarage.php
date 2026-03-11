<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna's Garage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<header>
        <h1>Luna's Garage</h1>
</header>
   <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#cars">Cars for Sale</a></li>
            <li><a href="#parts">Car Parts</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
   </nav>
   <header>
    <h2 class="welcome-text">Welcome to Luna's Garage</h2>
    <p class="welcome-text">Buy and sell cars and car parts with ease.
    </p>

    <main>
        <section id="cars" class="boxed cars-box">
            <h2>Cars for Sale</h2>
            <p>Browse our collection of available cars</p>
        </section>
        <section id="parts" class="boxed parts-box">
            <h2>Car Parts</h2>
            <p>Find high-quality parts for your vehicle</p>
        </section>
        <section id="contact">
            <h2>Contact Us</h2>
            <form id="contactForm" action="submit.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
        
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
        
                <button type="submit">Send Message</button>
        
                <!-- Feedback messages handled by PHP -->
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red;">Please fill in all fields correctly.</p>
                <?php elseif (isset($_GET['success'])): ?>
                    <p style="color: green;">Message sent successfully!</p>
                <?php endif; ?>
            </form>
        </section>
        </main>
   </header>
   <footer>
    <p>&copy; 2025 Luna's Garage. All rights reserved.</p>
   </footer>
   <script src="script.js"></script>
</header>
</html>