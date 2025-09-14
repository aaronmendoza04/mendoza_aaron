<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f0f23 100%);
            color: #e2e8f0;
            min-height: 100vh;
        }

        .container {
            max-width: 960px;
            margin: 3rem auto;
            background: rgba(26, 26, 46, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: #ffffff;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .main {
            padding: 2rem;
        }

        h2 {
            color: #e2e8f0;
            margin-top: 2rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        p {
            line-height: 1.6;
            margin-bottom: 1rem;
            color: #cbd5e0;
        }

        code, pre {
            display: block;
            background: rgba(255, 255, 255, 0.05);
            padding: 1rem;
            border-left: 4px solid #667eea;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #e2e8f0;
            overflow-x: auto;
            border-radius: 8px;
        }

        ul {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        li {
            margin-bottom: 0.5rem;
            color: #cbd5e0;
        }

        a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .footer {
            font-size: 0.9rem;
            text-align: center;
            padding: 1rem;
            background: rgba(26, 26, 46, 0.8);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #a0aec0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }

        .card {
            background: rgba(26, 26, 46, 0.8);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .card h3 {
            margin-top: 0;
            color: #e2e8f0;
            font-size: 1.2rem;
        }

        .card p {
            color: #cbd5e0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔥 LavaLust Framework</h1>
            <p>Lightweight • Fast • MVC for PHP Developers</p>
        </div>

        <div class="main">
            <h2>What is LavaLust?</h2>
            <p><strong>LavaLust</strong> is a lightweight PHP framework that follows the MVC (Model–View–Controller) pattern. It's designed for developers who want a structured yet minimalistic PHP development experience.</p>

            <h2>🚀 Key Features</h2>
            <div class="grid">
                <div class="card">
                    <h3>🧠 MVC Architecture</h3>
                    <p>Clear separation of concerns with Models, Views, and Controllers.</p>
                </div>
                <div class="card">
                    <h3>⚙️ Built-in Routing</h3>
                    <p>Clean and flexible routing system similar to Laravel or CodeIgniter.</p>
                </div>
                <div class="card">
                    <h3>📦 Libraries & Helpers</h3>
                    <p>Includes utilities for sessions, forms, database, validation, and more.</p>
                </div>
                <div class="card">
                    <h3>📁 Organized Structure</h3>
                    <p>Modular folder structure for scalable app development.</p>
                </div>
                <div class="card">
                    <h3>🔗 REST API Support</h3>
                    <p>Build robust RESTful APIs easily using built-in tools and conventions.</p>
                </div>
                <div class="card">
                    <h3>📘 ORM-like Models</h3>
                    <p>Use LavaLust's model layer for structured database operations with ease.</p>
                </div>
            </div>

            <h2>📂 Project Structure</h2>
            <pre><code>
/app
  /config
  /controllers
  /helpers
  /language
  /libraries
  /models
  /views
/console
/public
/runtime
/scheme
            </code></pre>

            <h2>🧪 Quick Example</h2>
                <p>Route in <code>app/config/routes.php</code></p>
<pre><code>
$router->get('/', 'Welcome::index');
</code></pre>
            <p>Controller method in <code>app/controllers/Welcome.php</code>:</p>
            <pre><code>
class Welcome extends Controller {
    public function index() {
        $this->call->view('welcome_page');
    }
}
            </code></pre>

            <p>View file at: <code>app/Views/welcome_page.php</code></p>

            <h2>📚 Learn More</h2>
            <ul>
                <li><a href="https://github.com/ronmarasigan/LavaLust">GitHub Repository</a></li>
                <li><a href="https://lavalust.netlify.app/">Official Documentation</a></li>
            </ul>
        </div>

        <div class="footer">
            Page rendered in <strong><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?></strong> seconds.
            Memory usage: <?php echo lava_instance()->performance->memory_usage(); ?>.
            <?php if(config_item('ENVIRONMENT') === 'development'): ?>
                <br>LavaLust Version <strong><?php echo config_item('VERSION'); ?></strong>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
