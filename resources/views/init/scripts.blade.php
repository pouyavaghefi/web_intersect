<script>
    // Tab navigation functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-tab');
        const contents = document.querySelectorAll('.admin-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const target = this.getAttribute('data-target');

                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Show target content
                contents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === target) {
                        content.classList.add('active');
                    }
                });
            });
        });
    });

    // Clock script
    (function(){
        // Helpers
        const $ = id => document.getElementById(id);
        const container = document.getElementById('clock-container');
        const analog = document.getElementById('analog-clock');
        const ticksG = document.getElementById('ticks');
        const numbersG = document.getElementById('numbers');
        const hourHand = document.getElementById('hour-hand');
        const minuteHand = document.getElementById('minute-hand');
        const secondHand = document.getElementById('second-hand');
        const digitalFO = document.getElementById('digital-fo');
        const digitalDisplay = document.getElementById('digital-display');
        const currentTimeSpan = document.getElementById('current-time');

        // Draw minute/hour ticks
        for (let i = 0; i < 60; i++) {
            const angle = i * 6;
            const length = (i % 5 === 0) ? 7 : 3;
            const strokeWidth = (i % 5 === 0) ? 1.6 : 0.9;
            const inner = 88 - length;
            const outer = 88;
            const g = document.createElementNS('http://www.w3.org/2000/svg','line');
            g.setAttribute('x1', 100 + inner * Math.sin(angle * Math.PI / 180));
            g.setAttribute('y1', 100 - inner * Math.cos(angle * Math.PI / 180));
            g.setAttribute('x2', 100 + outer * Math.sin(angle * Math.PI / 180));
            g.setAttribute('y2', 100 - outer * Math.cos(angle * Math.PI / 180));
            g.setAttribute('stroke-width', strokeWidth);
            g.setAttribute('stroke', i % 5 === 0 ? '#6b7280' : '#cbd5e1');
            ticksG.appendChild(g);
        }

        // Draw numbers 1..12
        for (let h = 1; h <= 12; h++) {
            const angle = h * 30;
            const x = 100 + Math.sin(angle * Math.PI / 180) * 68;
            const y = 100 - Math.cos(angle * Math.PI / 180) * 68 + 4; // small vertical tuning
            const text = document.createElementNS('http://www.w3.org/2000/svg','text');
            text.setAttribute('x', x);
            text.setAttribute('y', y);
            text.setAttribute('text-anchor', 'middle');
            text.setAttribute('dominant-baseline', 'middle');
            text.textContent = h.toString();
            text.setAttribute('fill', '#374151');
            text.setAttribute('font-size', '10');
            numbersG.appendChild(text);
        }

        // Update hands using precise time and animate with requestAnimationFrame for smoothness
        function updateClock() {
            const now = new Date();

            // precise positions (with fractional minutes/seconds)
            const milli = now.getMilliseconds();
            const s = now.getSeconds() + milli / 1000;
            const m = now.getMinutes() + s / 60;
            const h = (now.getHours() % 12) + m / 60;

            const hourDeg = h * 30; // 360/12
            const minuteDeg = m * 6; // 360/60
            const secondDeg = s * 6;

            hourHand.setAttribute('transform', `rotate(${hourDeg})`);
            minuteHand.setAttribute('transform', `rotate(${minuteDeg})`);
            secondHand.setAttribute('transform', `rotate(${secondDeg})`);

            // update digital display (if visible)
            const pad = n => String(n).padStart(2,'0');
            const hours24 = now.getHours();
            const ampm = hours24 >= 12 ? 'PM' : 'AM';
            const hours12 = ((hours24 + 11) % 12) + 1;
            const digital = `${pad(hours24)}:${pad(now.getMinutes())}:${pad(now.getSeconds())} ${ampm}`;
            if (digitalDisplay) digitalDisplay.textContent = digital;

            // update the shared #current-time span (keeps other UI synced)
            if (currentTimeSpan) currentTimeSpan.textContent = now.toLocaleString();

            requestAnimationFrame(updateClock);
        }

        // Toggle analog/digital view on click
        let digitalShown = false;
        container.addEventListener('click', () => {
            digitalShown = !digitalShown;
            digitalFO.style.display = digitalShown ? 'block' : 'none';
            document.getElementById('analog-clock').style.opacity = digitalShown ? '0.12' : '1';
            container.style.cursor = 'pointer';
        });

        // Keyboard accessibility: press Enter/Space when focused toggles
        container.setAttribute('tabindex', '0');
        container.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                container.click();
            }
        });

        // start clock
        requestAnimationFrame(updateClock);

        // optional: show tooltip on long hover (native title)
        container.title = "Click: toggle digital / analog. Press Enter to toggle (keyboard).";

    })();

    // 1️⃣ Live current time
    function updateTime() {
        const now = new Date();
        document.getElementById('current-time').innerText = now.toLocaleString();
    }
    setInterval(updateTime, 1000);
    updateTime();

    // 2️⃣ Dynamic quote using Quotable API
    fetch('https://api.quotable.io/random')
        .then(res => res.json())
        .then(data => {
            document.getElementById('quote').innerText = `"${data.content}" — ${data.author}`;
        })
        .catch(err => {
            document.getElementById('quote').innerText = '"The only way to do great work is to love what you do." — Steve Jobs';
        });

    // 3️⃣ Weather info using OpenWeatherMap (free API) - using a mock response
    setTimeout(() => {
        document.getElementById('weather-location').innerText = 'Amsterdam';
        document.getElementById('weather-temp').innerText = '18';
        document.getElementById('weather-desc').innerText = 'Partly cloudy';
        document.getElementById('weather-wind').innerText = '12';
    }, 1000);
</script>
