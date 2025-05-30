/**
 * World Heat Map Widget - Enhanced JavaScript
 * This file provides a more comprehensive world map implementation
 */

class WorldHeatMapWidget {
    constructor(elementId, settings, countriesData) {
        this.elementId = elementId;
        this.settings = settings;
        this.countriesData = countriesData;
        this.mapContainer = document.querySelector(`#${elementId}`);
        this.tooltip = document.querySelector(`#tooltip-${elementId.replace('world-map-', '')}`);
        
        this.init();
    }
    
    init() {
        this.createMap();
        this.setupEventListeners();
        this.setupAnimation();
    }
    
    createMap() {
        // Country code to coordinates mapping (simplified world map positions)
        const countryCoordinates = {
            'US': { x: 200, y: 150, name: 'United States' },
            'CA': { x: 180, y: 100, name: 'Canada' },
            'MX': { x: 180, y: 200, name: 'Mexico' },
            'BR': { x: 320, y: 280, name: 'Brazil' },
            'AR': { x: 300, y: 350, name: 'Argentina' },
            'CL': { x: 280, y: 340, name: 'Chile' },
            'PE': { x: 260, y: 250, name: 'Peru' },
            'CO': { x: 240, y: 220, name: 'Colombia' },
            'EC': { x: 230, y: 240, name: 'Ecuador' },
            'GB': { x: 480, y: 120, name: 'United Kingdom' },
            'FR': { x: 500, y: 140, name: 'France' },
            'DE': { x: 520, y: 130, name: 'Germany' },
            'IT': { x: 520, y: 160, name: 'Italy' },
            'ES': { x: 470, y: 170, name: 'Spain' },
            'PT': { x: 450, y: 180, name: 'Portugal' },
            'NL': { x: 510, y: 120, name: 'Netherlands' },
            'BE': { x: 505, y: 125, name: 'Belgium' },
            'CH': { x: 515, y: 145, name: 'Switzerland' },
            'AT': { x: 530, y: 140, name: 'Austria' },
            'PL': { x: 550, y: 120, name: 'Poland' },
            'CZ': { x: 535, y: 135, name: 'Czech Republic' },
            'SK': { x: 545, y: 138, name: 'Slovakia' },
            'HU': { x: 545, y: 145, name: 'Hungary' },
            'GR': { x: 560, y: 180, name: 'Greece' },
            'TR': { x: 580, y: 170, name: 'Turkey' },
            'RU': { x: 650, y: 100, name: 'Russia' },
            'UA': { x: 580, y: 130, name: 'Ukraine' },
            'SE': { x: 535, y: 80, name: 'Sweden' },
            'NO': { x: 520, y: 70, name: 'Norway' },
            'FI': { x: 560, y: 75, name: 'Finland' },
            'DK': { x: 520, y: 95, name: 'Denmark' },
            'IE': { x: 460, y: 115, name: 'Ireland' },
            'RS': { x: 550, y: 160, name: 'Serbia' },
            'CN': { x: 750, y: 160, name: 'China' },
            'IN': { x: 680, y: 200, name: 'India' },
            'JP': { x: 820, y: 160, name: 'Japan' },
            'KR': { x: 800, y: 150, name: 'South Korea' },
            'TH': { x: 720, y: 220, name: 'Thailand' },
            'VN': { x: 730, y: 220, name: 'Vietnam' },
            'MY': { x: 720, y: 240, name: 'Malaysia' },
            'SG': { x: 725, y: 245, name: 'Singapore' },
            'ID': { x: 750, y: 260, name: 'Indonesia' },
            'PH': { x: 780, y: 220, name: 'Philippines' },
            'AU': { x: 820, y: 320, name: 'Australia' },
            'NZ': { x: 860, y: 360, name: 'New Zealand' },
            'ZA': { x: 560, y: 320, name: 'South Africa' },
            'EG': { x: 580, y: 200, name: 'Egypt' },
            'MA': { x: 470, y: 190, name: 'Morocco' },
            'DZ': { x: 500, y: 190, name: 'Algeria' },
            'NG': { x: 520, y: 240, name: 'Nigeria' },
            'KE': { x: 590, y: 260, name: 'Kenya' },
            'UG': { x: 580, y: 265, name: 'Uganda' },
            'ZM': { x: 570, y: 290, name: 'Zambia' },
            'GH': { x: 500, y: 240, name: 'Ghana' },
            'CM': { x: 530, y: 250, name: 'Cameroon' },
            'SN': { x: 460, y: 230, name: 'Senegal' },
            'SA': { x: 610, y: 200, name: 'Saudi Arabia' },
            'AE': { x: 630, y: 210, name: 'UAE' },
            'QA': { x: 625, y: 205, name: 'Qatar' },
            'KW': { x: 615, y: 195, name: 'Kuwait' },
            'JO': { x: 590, y: 195, name: 'Jordan' },
            'LB': { x: 585, y: 185, name: 'Lebanon' },
            'IR': { x: 640, y: 180, name: 'Iran' },
            'PK': { x: 660, y: 180, name: 'Pakistan' },
            'BD': { x: 700, y: 200, name: 'Bangladesh' },
            'LK': { x: 690, y: 225, name: 'Sri Lanka' },
            'NP': { x: 690, y: 190, name: 'Nepal' },
            'TW': { x: 780, y: 200, name: 'Taiwan' },
            'HK': { x: 760, y: 205, name: 'Hong Kong' },
            'UZ': { x: 650, y: 150, name: 'Uzbekistan' },
            'PS': { x: 585, y: 190, name: 'Palestine' }
        };

        // Create SVG
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', '0 0 1000 400');
        svg.setAttribute('preserveAspectRatio', 'xMidYMid meet');
        svg.style.width = '100%';
        svg.style.height = '100%';

        // Create world background
        const worldBg = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
        worldBg.setAttribute('width', '1000');
        worldBg.setAttribute('height', '400');
        worldBg.setAttribute('fill', this.settings.defaultColor);
        worldBg.setAttribute('opacity', '0.3');
        svg.appendChild(worldBg);

        // Add continental shapes (simplified)
        this.addContinentalShapes(svg);

        // Add country markers
        Object.keys(this.countriesData).forEach(countryCode => {
            const coords = countryCoordinates[countryCode];
            if (coords) {
                const marker = this.createCountryMarker(countryCode, coords);
                svg.appendChild(marker);
            }
        });

        // Add labels for major regions
        this.addRegionLabels(svg);

        // Clear loading and add map
        setTimeout(() => {
            const loading = this.mapContainer.parentElement.querySelector('.map-loading');
            if (loading) {
                loading.style.display = 'none';
            }
            this.mapContainer.appendChild(svg);
            this.animateMarkers();
        }, this.settings.animationSpeed || 800);
    }

    addContinentalShapes(svg) {
        // Simplified continental outlines
        const continents = [
            // North America
            { d: 'M100,80 L300,80 L320,200 L280,220 L180,220 L120,180 Z', name: 'North America' },
            // South America
            { d: 'M200,220 L350,220 L340,380 L280,380 L260,300 Z', name: 'South America' },
            // Europe
            { d: 'M450,70 L600,70 L620,180 L480,200 L430,150 Z', name: 'Europe' },
            // Africa
            { d: 'M480,180 L620,180 L600,350 L520,360 L480,280 Z', name: 'Africa' },
            // Asia
            { d: 'M620,60 L880,60 L900,280 L750,300 L650,250 L620,180 Z', name: 'Asia' },
            // Australia
            { d: 'M780,300 L880,300 L890,360 L780,360 Z', name: 'Australia' }
        ];

        continents.forEach(continent => {
            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', continent.d);
            path.setAttribute('fill', this.settings.defaultColor);
            path.setAttribute('stroke', this.settings.borderColor);
            path.setAttribute('stroke-width', this.settings.borderWidth);
            path.setAttribute('opacity', '0.6');
            path.classList.add('continent-shape');
            svg.appendChild(path);
        });
    }

    createCountryMarker(countryCode, coords) {
        const country = this.countriesData[countryCode];
        const intensity = Math.min(country.value / 100, 1); // Normalize to 0-1
        
        // Create marker group
        const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        group.setAttribute('class', 'country-marker-group');
        group.setAttribute('data-country', countryCode);

        // Create pulsing circle background
        const pulseCircle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        pulseCircle.setAttribute('cx', coords.x);
        pulseCircle.setAttribute('cy', coords.y);
        pulseCircle.setAttribute('r', 8 + intensity * 8);
        pulseCircle.setAttribute('fill', this.settings.highlightedColor);
        pulseCircle.setAttribute('opacity', '0.3');
        pulseCircle.classList.add('pulse-circle');
        
        // Create main marker
        const marker = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        marker.setAttribute('cx', coords.x);
        marker.setAttribute('cy', coords.y);
        marker.setAttribute('r', 4 + intensity * 6);
        marker.setAttribute('fill', this.settings.highlightedColor);
        marker.setAttribute('stroke', this.settings.borderColor);
        marker.setAttribute('stroke-width', '2');
        marker.classList.add('country-marker');
        marker.style.cursor = 'pointer';

        // Create country label
        const label = document.createElementNS('http://www.w3.org/2000/svg', 'text');
        label.setAttribute('x', coords.x);
        label.setAttribute('y', coords.y - 15);
        label.setAttribute('text-anchor', 'middle');
        label.setAttribute('font-size', '10');
        label.setAttribute('font-weight', 'bold');
        label.setAttribute('fill', this.settings.legendTextColor || '#2c3e50');
        label.setAttribute('opacity', '0');
        label.textContent = countryCode;
        label.classList.add('country-label');

        group.appendChild(pulseCircle);
        group.appendChild(marker);
        group.appendChild(label);

        return group;
    }

    addRegionLabels(svg) {
        const regions = [
            { x: 200, y: 40, text: 'NORTH AMERICA', size: '14' },
            { x: 300, y: 380, text: 'SOUTH AMERICA', size: '14' },
            { x: 520, y: 40, text: 'EUROPE', size: '14' },
            { x: 550, y: 380, text: 'AFRICA', size: '14' },
            { x: 750, y: 40, text: 'ASIA', size: '14' },
            { x: 830, y: 380, text: 'AUSTRALIA', size: '12' }
        ];

        regions.forEach(region => {
            const label = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            label.setAttribute('x', region.x);
            label.setAttribute('y', region.y);
            label.setAttribute('text-anchor', 'middle');
            label.setAttribute('font-size', region.size);
            label.setAttribute('font-weight', 'bold');
            label.setAttribute('fill', this.settings.legendTextColor || '#7f8c8d');
            label.setAttribute('opacity', '0.7');
            label.setAttribute('letter-spacing', '2px');
            label.textContent = region.text;
            label.classList.add('region-label');
            svg.appendChild(label);
        });
    }

    setupEventListeners() {
        // Mouse events for markers
        this.mapContainer.addEventListener('mouseover', (e) => {
            if (e.target.classList.contains('country-marker')) {
                this.handleMarkerHover(e, true);
            }
        });

        this.mapContainer.addEventListener('mouseout', (e) => {
            if (e.target.classList.contains('country-marker')) {
                this.handleMarkerHover(e, false);
            }
        });

        this.mapContainer.addEventListener('mousemove', (e) => {
            if (e.target.classList.contains('country-marker')) {
                this.updateTooltipPosition(e);
            }
        });

        this.mapContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('country-marker')) {
                this.handleMarkerClick(e);
            }
        });
    }

    handleMarkerHover(event, isHover) {
        const marker = event.target;
        const group = marker.closest('.country-marker-group');
        const countryCode = group.getAttribute('data-country');
        const label = group.querySelector('.country-label');

        if (isHover) {
            // Show hover state
            marker.setAttribute('fill', this.settings.hoverColor);
            marker.style.transform = 'scale(1.3)';
            marker.style.transformOrigin = 'center';
            label.setAttribute('opacity', '1');
            
            // Show tooltip
            if (this.settings.showTooltip && this.tooltip) {
                this.showTooltip(countryCode, event);
            }
        } else {
            // Reset state
            marker.setAttribute('fill', this.settings.highlightedColor);
            marker.style.transform = 'scale(1)';
            label.setAttribute('opacity', '0');
            
            // Hide tooltip
            if (this.tooltip) {
                this.hideTooltip();
            }
        }
    }

    handleMarkerClick(event) {
        const group = event.target.closest('.country-marker-group');
        const countryCode = group.getAttribute('data-country');
        const country = this.countriesData[countryCode];
        
        // Dispatch custom event for external handling
        const customEvent = new CustomEvent('countrySelected', {
            detail: { countryCode, country }
        });
        this.mapContainer.dispatchEvent(customEvent);
        
        // Optional: zoom to country or show detailed info
        console.log('Country selected:', country);
    }

    showTooltip(countryCode, event) {
        const country = this.countriesData[countryCode];
        if (!country || !this.tooltip) return;

        const tooltipContent = this.tooltip.querySelector('.tooltip-content');
        tooltipContent.querySelector('.tooltip-country').textContent = country.name;
        tooltipContent.querySelector('.tooltip-value').textContent = `Value: ${country.value}`;
        tooltipContent.querySelector('.tooltip-info').textContent = country.info || '';

        this.tooltip.style.display = 'block';
        this.updateTooltipPosition(event);
    }

    hideTooltip() {
        if (this.tooltip) {
            this.tooltip.style.display = 'none';
        }
    }

    updateTooltipPosition(event) {
        if (!this.tooltip) return;
        
        const tooltipRect = this.tooltip.getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        const viewportHeight = window.innerHeight;
        
        let left = event.pageX + 10;
        let top = event.pageY - 10;
        
        // Adjust if tooltip goes off screen
        if (left + tooltipRect.width > viewportWidth) {
            left = event.pageX - tooltipRect.width - 10;
        }
        
        if (top + tooltipRect.height > viewportHeight) {
            top = event.pageY - tooltipRect.height - 10;
        }
        
        this.tooltip.style.left = left + 'px';
        this.tooltip.style.top = top + 'px';
    }

    animateMarkers() {
        const markers = this.mapContainer.querySelectorAll('.country-marker-group');
        
        markers.forEach((marker, index) => {
            setTimeout(() => {
                marker.style.opacity = '0';
                marker.style.transform = 'scale(0)';
                marker.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    marker.style.opacity = '1';
                    marker.style.transform = 'scale(1)';
                }, 50);
                
            }, index * 100);
        });

        // Animate pulse circles
        setTimeout(() => {
            this.startPulseAnimation();
        }, markers.length * 100 + 500);
    }

    startPulseAnimation() {
        const pulseCircles = this.mapContainer.querySelectorAll('.pulse-circle');
        
        pulseCircles.forEach(circle => {
            circle.style.animation = 'pulse 2s ease-in-out infinite';
        });

        // Add CSS for pulse animation if not exists
        if (!document.querySelector('#pulse-animation-styles')) {
            const style = document.createElement('style');
            style.id = 'pulse-animation-styles';
            style.textContent = `
                @keyframes pulse {
                    0% { transform: scale(1); opacity: 0.3; }
                    50% { transform: scale(1.5); opacity: 0.1; }
                    100% { transform: scale(1); opacity: 0.3; }
                }
            `;
            document.head.appendChild(style);
        }
    }

    setupAnimation() {
        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.3
        });

        const animateElements = document.querySelectorAll('.animate-on-scroll');
        animateElements.forEach(el => observer.observe(el));
    }

    // Public methods for external control
    highlightCountry(countryCode) {
        const marker = this.mapContainer.querySelector(`[data-country="${countryCode}"] .country-marker`);
        if (marker) {
            marker.setAttribute('fill', this.settings.hoverColor);
            marker.style.transform = 'scale(1.5)';
        }
    }

    resetHighlight(countryCode) {
        const marker = this.mapContainer.querySelector(`[data-country="${countryCode}"] .country-marker`);
        if (marker) {
            marker.setAttribute('fill', this.settings.highlightedColor);
            marker.style.transform = 'scale(1)';
        }
    }

    updateCountryData(countryCode, newData) {
        this.countriesData[countryCode] = { ...this.countriesData[countryCode], ...newData };
        // Optionally recreate the marker with new data
    }

    destroy() {
        // Cleanup event listeners and animations
        this.mapContainer.innerHTML = '';
    }
}

// Global initialization function
window.initWorldHeatMap = function(elementId, settings, countriesData) {
    return new WorldHeatMapWidget(elementId, settings, countriesData);
};