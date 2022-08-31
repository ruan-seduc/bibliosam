
/*=============== ACCORDION ===============*/
const accordionItems = document.querySelectorAll('.accordion__item')

// 1. Selecionar cada item
accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion__header')

    // 2. Selecionar cada click
    accordionHeader.addEventListener('click', () => {
        // 7. Criar a variável
        const openItem = document.querySelector('.accordion-open')

        // 5. Chamar a funcao toggle item
        toggleItem(item)

        // 8. Validar se a classe existe
        if (openItem && openItem !== item) {
            toggleItem(openItem)
        }
    })
})

// 3. Criar uma funcao const
const toggleItem = (item) => {
    // 3.1 Criar a variavel
    const accordionContent = item.querySelector('.accordion__content')

    // 6. Se existir outro elemento que contenha a classe accordion-open, remova sua classe
    if (item.classList.contains('accordion-open')) {
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    } else {
        // 4. Pegar o height maximo do container
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}