/**
 * Video Popup Functionality
 * Handles YouTube, Vimeo and other video providers
 */
function openVideoPopup(videoUrl, aspectRatio, playOnMobile) {
    // Ensure parameters are properly sanitized
    videoUrl = (typeof videoUrl === 'string') ? videoUrl.trim() : '';
    aspectRatio = (typeof aspectRatio === 'string') ? aspectRatio.trim() : '169';
    playOnMobile = (playOnMobile === true || playOnMobile === 'true');
    
    if (!videoUrl) {
        console.error('No video URL provided');
        return;
    }
    
    // Get elements
    const overlay = document.getElementById('video-popup-overlay');
    const content = document.getElementById('video-popup-content');
    const closeBtn = document.querySelector('.video-popup-close');
    
    if (!overlay || !content || !closeBtn) {
        console.error('Video popup elements not found');
        return;
    }
    
    // Clear previous content
    content.innerHTML = '';
    
    // Set the appropriate aspect ratio
    content.className = 'video-popup-content';
    try {
        // Safely add the aspect ratio class
        content.classList.add('ratio-' + aspectRatio);
    } catch (e) {
        console.warn('Invalid aspect ratio format:', e);
        // Fallback to default 16:9
        content.classList.add('ratio-169');
    }
    
    // Determine video type and create appropriate embed
    let embedHtml = '';
    
    try {
        if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
            // YouTube video
            let youtubeId = '';
            
            if (videoUrl.includes('youtube.com')) {
                const urlParams = new URLSearchParams(new URL(videoUrl).search);
                youtubeId = urlParams.get('v');
            } else if (videoUrl.includes('youtu.be')) {
                youtubeId = videoUrl.split('/').pop().split('?')[0];
            }
            
            if (youtubeId) {
                const autoplay = playOnMobile ? '&autoplay=1' : '&autoplay=1&mute=1';
                embedHtml = `<iframe 
                    src="https://www.youtube.com/embed/${youtubeId}?rel=0${autoplay}&controls=1&modestbranding=1&rel=0&showinfo=0&fs=0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>`;
            }
        } else if (videoUrl.includes('vimeo.com')) {
            // Vimeo video
            let vimeoId = '';
            const vimeoRegex = /vimeo\.com\/(?:video\/)?(\d+)/;
            const match = videoUrl.match(vimeoRegex);
            
            if (match && match[1]) {
                vimeoId = match[1];
            }
            
            if (vimeoId) {
                const autoplay = playOnMobile ? '&autoplay=1' : '&autoplay=1&muted=1';
                embedHtml = `<iframe 
                    src="https://player.vimeo.com/video/${vimeoId}?${autoplay}" 
                    allow="autoplay; fullscreen; picture-in-picture" 
                    allowfullscreen></iframe>`;
            }
        } else if (videoUrl.match(/\.(mp4|webm|ogg)$/i)) {
            // Direct video file
            const videoType = videoUrl.split('.').pop().toLowerCase();
            embedHtml = `<video controls autoplay>
                <source src="${videoUrl}" type="video/${videoType}">
                Your browser does not support the video tag.
            </video>`;
        } else {
            // Default - try iframe
            embedHtml = `<iframe src="${videoUrl}" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
        }
    } catch (e) {
        console.error('Error parsing video URL:', e);
        embedHtml = `<div class="video-error">Sorry, unable to play this video. Please check the URL.</div>`;
    }
    
    // Set the embed HTML
    content.innerHTML = embedHtml;
    
    // Show the popup
    overlay.style.display = 'flex';
    document.body.classList.add('popup-open');
    
    // Handle close button click
    const closeHandler = function() {
        closeVideoPopup();
    };
    
    closeBtn.addEventListener('click', closeHandler);
    
    // Handle outside click to close
    const overlayClickHandler = function(e) {
        if (e.target === overlay) {
            closeVideoPopup();
        }
    };
    overlay.addEventListener('click', overlayClickHandler);
    
    // Handle escape key to close
    const keyHandler = function(e) {
        if (e.key === 'Escape') {
            closeVideoPopup();
        }
    };
    document.addEventListener('keydown', keyHandler);
    
    // Store the handlers for cleanup
    overlay.setAttribute('data-handlers', 'active');
    
    function closeVideoPopup() {
        // Clear content to stop videos
        content.innerHTML = '';
        
        // Hide the popup
        overlay.style.display = 'none';
        document.body.classList.remove('popup-open');
        
        // Remove event listeners
        closeBtn.removeEventListener('click', closeHandler);
        overlay.removeEventListener('click', overlayClickHandler);
        document.removeEventListener('keydown', keyHandler);
        
        // Mark handlers as removed
        overlay.removeAttribute('data-handlers');
    }
}

// Initialize video popups when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to all video popup triggers
    const triggers = document.querySelectorAll('.video-popup-trigger');
    triggers.forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const videoUrl = this.getAttribute('data-video-url');
            const aspectRatio = this.getAttribute('data-aspect-ratio') || '169';
            const playMobile = this.getAttribute('data-play-mobile') === 'true';
            
            if (videoUrl) {
                openVideoPopup(videoUrl, aspectRatio, playMobile);
            }
        });
    });
    
    // Initialize global closeVideoPopup function
    window.closeVideoPopup = function() {
        const overlay = document.getElementById('video-popup-overlay');
        const content = document.getElementById('video-popup-content');
        
        if (overlay && content) {
            // Clear content to stop videos
            content.innerHTML = '';
            
            // Hide the popup
            overlay.style.display = 'none';
            document.body.classList.remove('popup-open');
        }
    };
});