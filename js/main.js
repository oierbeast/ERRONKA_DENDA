/**
 * main.js - Funciones comunes utilizadas en múltiples páginas
 */

/**
 * Controla la reproducción de audio
 * Pausa todos los audios excepto el seleccionado, y alterna play/pause
 * @param {string} audioId - ID del elemento audio a controlar
 */
function toggleAudio(audioId) {
    const audio = document.getElementById(audioId);
    const allAudios = document.querySelectorAll('audio');
    
    // Pausar todas las canciones
    allAudios.forEach(a => {
        if (a.id !== audioId) {
            a.pause();
        }
    });
    
    // Reproducir o pausar la canción actual
    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
    }
}
