"use strict";
const canvas = document.getElementById("gameCanvas");
    const ctx = canvas.getContext("2d");

    // Set canvas size to full screen
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Player character properties
    const player = {
      x: canvas.width / 2,
      y: canvas.height / 2,
      width: 20,
      height: 20,
      speed: 5,
    };

    // Array to store static objects
    const objects = [];

    // Add static objects with positions and sizes
    objects.push({ x: 100, y: 100, width: 30, height: 30 });
    objects.push({ x: 200, y: 200, width: 40, height: 40 });
    objects.push({ x: 300, y: 300, width: 50, height: 50 });

    // Game loop
    function gameLoop() {
      clearCanvas();
      movePlayer();
      drawObjects();
      drawPlayer();
      requestAnimationFrame(gameLoop);
    }

    // Clear the canvas
    function clearCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    // Update player position based on user input
    function movePlayer() {
      const originalX = player.x;
      const originalY = player.y;

      if (keys["ArrowUp"] || keys["w"]) {
        player.y -= player.speed;
      }
      if (keys["ArrowDown"] || keys["s"]) {
        player.y += player.speed;
      }
      if (keys["ArrowLeft"] || keys["a"]) {
        player.x -= player.speed;
      }
      if (keys["ArrowRight"] || keys["d"]) {
        player.x += player.speed;
      }

      // Ensure player stays within the canvas boundaries
      player.x = Math.max(0, Math.min(canvas.width - player.width, player.x));
      player.y = Math.max(0, Math.min(canvas.height - player.height, player.y));

      // Check for collisions with objects
      for (const object of objects) {
        if (
          player.x < object.x + object.width &&
          player.x + player.width > object.x &&
          player.y < object.y + object.height &&
          player.y + player.height > object.y
        ) {
          // Collision detected, reset player position
          player.x = originalX;
          player.y = originalY;
          break; // Stop checking other objects after the first collision
        }
      }
    }

    // Draw the player character
    function drawPlayer() {
      ctx.fillStyle = "blue";
      ctx.fillRect(player.x, player.y, player.width, player.height);
    }

    // Draw the static objects
    function drawObjects() {
      ctx.fillStyle = "red";
      for (const object of objects) {
        ctx.fillRect(object.x, object.y, object.width, object.height);
      }
    }

    // Keyboard input handling
    const keys = {};

    window.addEventListener("keydown", (e) => {
      keys[e.key] = true;
    });

    window.addEventListener("keyup", (e) => {
      keys[e.key] = false;
    });

    // Start the game loop
    gameLoop();