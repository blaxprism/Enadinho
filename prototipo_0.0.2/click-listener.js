export default function createClickListener(document){
	const state = {
		observers: []
	}

	function subscribe(observerFunction){
		state.observers.push(observerFunction)
	}

	function notifyAll(command){
		console.log(`Notifying ${state.observers.length} observers`)

		for (const observerFunction of state.observers){
			observerFunction(command)
		}
	}

	//ouve quando click for acionado, e executa a função clickOnButton com o valor do evento sendo passado
	document.getElementById('enviar').addEventListener('click', clickOnButton)

	function clickOnButton(){
		const command = {
			enviar: true
		}
		console.log(state.observers)
		notifyAll(command)
	}

	return{
		clickOnButton,
		subscribe,
		notifyAll,
	}
}