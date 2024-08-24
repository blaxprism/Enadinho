export default function criarCoordenador(){
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
	
	return{
		subscribe,
		notifyAll,
	}
}