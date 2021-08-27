document.addEventListener('DOMContentLoaded', () => {
    //codigo
    const character = document.querySelector('.character')
    const MAXIMUN_HEIGHT = 250
    const GRAVITY = 0.9
    const KEY_UP = 38;
    const KEY_LEFT = 37;
    const KEY_RIGHT =39;
    const KEY_DOWN =40;


    let timerLeft
    let timerRight
    let isGoingLeft = false
    let isGoingRight = false
    let isJumping = false

    let bottom = 0
    let left = 0

    function jump(){
        //evento salto
        if (isJumping) return

        character.classList.add('character')
        character.classList.remove('character-sliding')
//arrow function
      let timerup = setInterval(() => {
            if (bottom >= MAXIMUN_HEIGHT){
                clearInterval(timerup)
                let timeDown = setInterval(() => {
                    if (bottom <= 0){|
                        clearInterval(timeDown)
                        isJumping= false
                    }
                    bottom -=5
                    character.style.bottom = bottom + 'px'
                }, 20)
                //HACER BAJAR PERSONAJE
            }

            
            bottom += 30
            character.style.bottom = (bottom * GRAVITY) + 'px';
        }, 20)
    }

    function slideLeft(){

        character.classList.add('character-sliding')
        character.classList.remove('character')

        if (isGoingRight) {
            clearInterval(timerRight)
            isGoingRight =false
        }
        if (isGoingLeft) return
        isGoingLeft = true

         timerLeft = setInterval(() => {
            left -= 5
            character.style.left = left + 'px'
        }, 20)

    }

    function slideRight(){
        character.classList.add('character-sliding')
        character.classList.remove('character')

    if (isGoingLeft) {
        clearInterval(timerLeft)
        isGoingLeft =false
    } 
    if (isGoingRight) return
        isGoingRight = true

        timerRight = setInterval(() => {
            left += 5
            character.style.left = left + 'px'
        }, 20)
    }

    function slideDown(){
        character.classList.add('character')
        character.classList.remove('character-sliding')

        clearInterval(timerLeft)
        clearInterval(timerRight)

        isGoingRight = false
        isGoingLeft = false
        isJumping = false

   
    }

    document.addEventListener('keydown',(event) => {
        switch(event.keyCode) {
            case KEY_UP:
                jump()
                break;
                case KEY_LEFT:
                    slideLeft()
                    break;
                    case KEY_RIGHT:
                        slideRight()
                        break;
                        case KEY_DOWN:
                            slideDown()
                            break;
        }
    })
})