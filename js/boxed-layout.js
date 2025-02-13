document.addEventListener("DOMContentLoaded", function() {
        // Select all h1 elements and h2 elements
        const h1Elements = document.querySelectorAll('main h1');
        const h2Elements = document.querySelectorAll('main h2');
        const homeWidgets = document.querySelectorAll('main .home-widget');

        // Add 'white-column' class to h2 elements that do not have 'purple-column' class
        h2Elements.forEach(function(h2) {
            if (!h2.classList.contains('purple-column')) {
                h2.classList.add('white-column');
            }
        });

        // Function to check if an element is within a block-column
        function isWithinBlockColumn(element) {
            let parent = element.parentElement;
            while (parent) {
                if (parent.classList.contains('block-column')) {
                    return true;
                }
                parent = parent.parentElement;
            }
            return false;
        }

        // Function to wrap element in a div
        function wrapInDiv(element, addSpans = false, addClass = '') {
            const wrapperDiv = document.createElement('div');

            // Determine which classes to add to the block-column
            let classesToAdd = ['block-column'];
            if (element.tagName === 'H1') {
                classesToAdd.push('hero-section');
            }
            if (addClass) {
                classesToAdd.push(addClass);
            }
            // Set class to 'block-column' and add the selected classes
            wrapperDiv.className = classesToAdd.join(' ');
            element.parentNode.insertBefore(wrapperDiv, element);

            // Add four spans with different images to the block-column before the heading if addSpans is true
            if (addSpans) {
                const imageUrls = [
                    '/wp-content/uploads/2024/08/frame-top-left.webp',
                    '/wp-content/uploads/2024/08/frame-top-right.webp',
                    '/wp-content/uploads/2024/08/frame-bottom-left.webp',
                    '/wp-content/uploads/2024/08/frame-bottom-right.webp'
                ];

                const imageAlts = [
                    'Frame Top Left',
                    'Frame Top Right',
                    'Frame Bottom Left',
                    'Frame Bottom Right'
                ];

                imageUrls.forEach(function(url, index) {
                    const span = document.createElement('span');
                    const img = document.createElement('img');
                    img.src = url; // Placeholder image URL
                    img.alt = imageAlts[index]; // Add alt attribute
                    img.width = 13;
                    img.height = 13;
                    span.className = `span-${index + 1}`; // Assign a unique class to each span
                    span.appendChild(img);
                    wrapperDiv.appendChild(span);
                });
            }

            // Add block-inner if the block-column has class white-column, purple-column, or hero-section before the heading
            let blockInner, blockWrapper;
            if (wrapperDiv.classList.contains('white-column') || wrapperDiv.classList.contains('purple-column') || wrapperDiv.classList.contains('hero-section')) {
                blockInner = document.createElement('div');
                blockInner.className = 'block-inner';

                // Add block-wrapper as a child of block-inner
                blockWrapper = document.createElement('div');
                blockWrapper.className = 'block-wrapper';
                blockInner.appendChild(blockWrapper);

                wrapperDiv.appendChild(blockInner);
            }

            // Clone the element within the new div and remove the original element
            if (blockInner) {
                blockWrapper.appendChild(element.cloneNode(true));
            } else {
                wrapperDiv.appendChild(element.cloneNode(true));
            }
            element.parentNode.removeChild(element);

            // Move elements to the block-column until the next heading or the end of the hero-section (last paragraph)
            let nextElement = wrapperDiv.nextElementSibling;
            if (wrapperDiv.classList.contains('hero-section')) {
                while (nextElement && nextElement.tagName !== 'H1' && nextElement.tagName !== 'H2' && !nextElement.classList.contains('home-widget') && !nextElement.classList.contains('review-section')) {
                    const next = nextElement.nextElementSibling;
                    if (blockInner) {
                        blockWrapper.appendChild(nextElement); // Append to block-wrapper
                    } else {
                        wrapperDiv.appendChild(nextElement);
                    }
                    nextElement = next;
                }
            } else {
                while (nextElement && nextElement.tagName !== 'H1' && nextElement.tagName !== 'H2' && !nextElement.classList.contains('review-section')) {
                    const next = nextElement.nextElementSibling;
                    if (blockInner) {
                        blockWrapper.appendChild(nextElement); // Append to block-wrapper
                    } else {
                        wrapperDiv.appendChild(nextElement);
                    }
                    nextElement = next;
                }
            }

            // Close block-inner if it exists
            if (blockInner) {
                wrapperDiv.appendChild(blockInner);
            }
        }

        // Wrap all h1 elements without spans
        h1Elements.forEach(function(h1) {
            wrapInDiv(h1, false);
        });

        // Wrap all h2 elements with spans
        const h2WrappedElements = document.querySelectorAll('h2.white-column, h2.purple-column');
        h2WrappedElements.forEach(function(h2) {
            // Check if h2 is within a wp-block-columns wp-block-column
            if (h2.closest('.wp-block-columns') && h2.closest('.wp-block-column')) {
                // If h2 is already within a block-column, move wp-block-columns out and wrap it
                let wpBlockColumns = h2.closest('.wp-block-columns');
                if (isWithinBlockColumn(wpBlockColumns)) {
                    let blockColumn = wpBlockColumns.closest('.block-column');
                    if (blockColumn) {
                        blockColumn.parentNode.insertBefore(wpBlockColumns, blockColumn.nextSibling);
                    }
                }
                // Wrap the wp-block-columns in a new block-column with the appropriate class
                let addClass = h2.classList.contains('white-column') ? 'white-column' : 'purple-column';
                wrapInDiv(wpBlockColumns, true, addClass);
            } else if (!isWithinBlockColumn(h2)) {
                let addClass = h2.classList.contains('white-column') ? 'white-column' : 'purple-column';
                wrapInDiv(h2, true, addClass);
            }
        });

        // Wrap home-widget elements not within block-column white-column in block-column block-widget along with subsequent elements until the next block-column or h2
        homeWidgets.forEach(function(widget) {
            if (!isWithinBlockColumn(widget)) {
                const wrapperDiv = document.createElement('div');
                wrapperDiv.className = 'block-column block-widget';
                widget.parentNode.insertBefore(wrapperDiv, widget);

                let blockInner = document.createElement('div');
                blockInner.className = 'block-inner';

                let blockWrapper = document.createElement('div');
                blockWrapper.className = 'block-wrapper';
                blockInner.appendChild(blockWrapper);
                wrapperDiv.appendChild(blockInner);

                blockWrapper.appendChild(widget);

                // Add spans to the wrapperDiv
                const imageUrls = [
                    '/wp-content/uploads/2024/08/frame-top-left.webp',
                    '/wp-content/uploads/2024/08/frame-top-right.webp',
                    '/wp-content/uploads/2024/08/frame-bottom-left.webp',
                    '/wp-content/uploads/2024/08/frame-bottom-right.webp'
                ];

                const imageAlts = [
                    'Frame Top Left',
                    'Frame Top Right',
                    'Frame Bottom Left',
                    'Frame Bottom Right'
                ];

                imageUrls.forEach(function(url, index) {
                    const span = document.createElement('span');
                    const img = document.createElement('img');
                    img.src = url;
                    img.alt = imageAlts[index];
                    img.width = 13;
                    img.height = 13;
                    span.className = `span-${index + 1}`;
                    span.appendChild(img);
                    wrapperDiv.appendChild(span);
                });

                // Move elements to the block-column block-widget until the next heading or block-column
                let nextElement = widget.nextElementSibling;
                while (nextElement && !nextElement.classList.contains('block-column') && nextElement.tagName !== 'H2') {
                    const next = nextElement.nextElementSibling;
                    blockWrapper.appendChild(nextElement);
                    nextElement = next;
                }
            }
        });

        // Ensure all elements are included in block-column white-column or block-widget after h2 or home-widget
        let elements = Array.from(document.body.children);
        let wrapperDiv = null;

        elements.forEach(function(element) {
            if ((element.tagName === 'H2' && (element.classList.contains('white-column') || element.classList.contains('purple-column'))) || (element.classList.contains('home-widget') && !isWithinBlockColumn(element))) {
                if (!wrapperDiv) {
                    let addClass = element.classList.contains('home-widget') ? 'block-widget' : 'white-column';
                    wrapperDiv = document.createElement('div');
                    wrapperDiv.className = `block-column ${addClass}`;
                    element.parentNode.insertBefore(wrapperDiv, element);

                    let blockInner = document.createElement('div');
                    blockInner.className = 'block-inner';

                    let blockWrapper = document.createElement('div');
                    blockWrapper.className = 'block-wrapper';
                    blockInner.appendChild(blockWrapper);
                    wrapperDiv.appendChild(blockInner);
                }
                let blockWrapper = wrapperDiv.querySelector('.block-wrapper');
                blockWrapper.appendChild(element);

                let nextElement = wrapperDiv.nextElementSibling;
                while (nextElement && !nextElement.classList.contains('block-column') && nextElement.tagName !== 'H2') {
                    const next = nextElement.nextElementSibling;
                    blockWrapper.appendChild(nextElement);
                    nextElement = next;
                }

                // Ensure the wrapper div is closed before the next block-column or h2
                if (nextElement && (nextElement.classList.contains('block-column') || nextElement.tagName === 'H2')) {
                    wrapperDiv = null;
                }
            }
        });

        // Ensure elements following home-widget are wrapped in the same block-widget div
        homeWidgets.forEach(function(widget) {
            let parentDiv = widget.closest('.block-widget');
            if (parentDiv) {
                let nextElement = widget.nextElementSibling;
                while (nextElement && !nextElement.classList.contains('block-column') && nextElement.tagName !== 'H2') {
                    const next = nextElement.nextElementSibling;
                    parentDiv.querySelector('.block-wrapper').appendChild(nextElement);
                    nextElement = next;
                }
            }
        });

        // Move h2 elements to be right before home-widget if they are immediately above block-column block-widget
        document.querySelectorAll('h2').forEach(function(h2) {
            let nextElement = h2.nextElementSibling;
            if (nextElement && nextElement.classList.contains('block-column') && nextElement.classList.contains('block-widget')) {
                let homeWidget = nextElement.querySelector('.home-widget');
                if (homeWidget) {
                    homeWidget.parentNode.insertBefore(h2, homeWidget);
                }
            }
        });

        // Close block-column hero-section before review-section if article contains h1
        const articles = document.querySelectorAll('article');
        articles.forEach(function(article) {
            const h1InArticle = article.querySelector('h1');
            if (h1InArticle) {
                const reviewSection = article.querySelector('section.review-section');
                if (reviewSection) {
                    const heroSectionDiv = article.querySelector('.block-column.hero-section');
                    if (heroSectionDiv) {
                        // Close hero-section div before review-section
                        reviewSection.parentNode.insertBefore(heroSectionDiv.nextSibling, reviewSection);
                    }
                }
            }
        });
    });