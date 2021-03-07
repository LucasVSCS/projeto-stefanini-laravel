require('./bootstrap')
require('./cep-api')
import Inputmask from 'inputmask'
import 'bootstrap'

// Gerando e exibindo o ano atual no footer da página
document.getElementById('yearNow').textContent = new Date().getFullYear()

// Implementando a máscara do input "CEP" no carrinho de compras
Inputmask('99999-999').mask(document.getElementById('zip'))
