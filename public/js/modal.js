const windowBackground = document.getElementById('window-background'),
      windowContainer = document.getElementById('window-container'),
      openButton = document.getElementById('open-button'),
      closeButton = document.getElementById('close-button')


openButton.addEventListener('click', ()=>windowBackground.style.display = 'flex')

const closeWindow = () => {
    windowContainer.classList.add('close')

    setTimeout(() => {
        windowContainer.classList.remove('close')
        windowBackground.style.display = 'none'
    }, 1000);
}

closeButton.addEventListener('click', () => closeWindow())