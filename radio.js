const notes = ['♪', '♫', '𝅗𝅥', '𝄞'];
const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FDCB6E', '#6C5CE7'];
let notesVisible = true;

function createNote() {
    if (notesVisible) {
        const note = document.createElement('div');
        note.className = 'note';
        note.textContent = notes[Math.floor(Math.random() * notes.length)];
        note.style.left = `${Math.random() * 100}vw`;
        note.style.color = colors[Math.floor(Math.random() * colors.length)];
        note.style.animationDuration = `${5 + Math.random() * 5}s`;
        document.body.appendChild(note);

        setTimeout(() => {
            note.remove();
        }, 10000);
    }
}

setInterval(createNote, 300);

function updateNowPlaying() {
    fetch('https://qwertz-exe.com/current_track.txt')
        .then(response => response.text())
        .then(data => {
            const [artist, title, imageFile] = data.trim().split('|');
            document.getElementById('track-info').textContent = `${artist} - ${title}`;
            document.getElementById('artist-image').src = `https://qwertz-exe.com/images/${imageFile}`;
        })
        .catch(error => console.error('Error fetching track info:', error));
}

setInterval(updateNowPlaying, 2000);
updateNowPlaying();

function updateOtherListeners() {
    fetch('https://qwertz-exe.com/status-json.xsl')
        .then(response => response.json())
        .then(data => {
            const listeners = data.icestats.source.listeners;
            document.getElementById('other-listeners').textContent = `You are listening with ${listeners-1} other listeners right now!`;
        })
        .catch(error => console.error('Error fetching track info:', error));
}

setInterval(updateOtherListeners, 10000);
updateOtherListeners();

let audio = new Audio('https://qwertz-exe.com/radio.opus');
const playStopBtn = document.getElementById('playStopBtn');
const volumeSlider = document.getElementById('volumeSlider');
audio.pause();

playStopBtn.addEventListener('click', () => {
    if (audio.paused) {
        audio = new Audio('https://qwertz-exe.com/radio.opus');
        audio.volume = volumeSlider.value;
        audio.play();
        playStopBtn.textContent = 'Stop';
    } else {
        audio.pause();
        audio.currentTime = 0;
        audio = new Audio('https://qwertz-exe.com/radio.opus');
        playStopBtn.textContent = 'Play';
    }
});

volumeSlider.addEventListener('input', (e) => {
    audio.volume = e.target.value;
});

audio.play().catch(e => {
    console.log("Autoplay prevented");
    playStopBtn.textContent = 'Play';
});

function toggleNotes() {
    notesVisible = !notesVisible;
    const notes = document.querySelectorAll('.note');
    notes.forEach(note => {
        if (notesVisible) {
            note.style.display = 'block';
        } else {
            note.style.display = 'none';
        }
    });
    document.getElementById('toggle-notes').textContent = notesVisible ? 'Hide Notes' : 'Show Notes';
}

document.getElementById('toggle-notes').addEventListener('click', toggleNotes);