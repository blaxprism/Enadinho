export default function createGame(){
	const state = {
		players: {},
		metadados: {},
		questoes: {},
		respostas: {}
	}

	const observers = []

	function start(){
		const frequency = 2000

		setInterval(addFruit, frequency)
	}

	function subscribe(observerFunction){
		observers.push(observerFunction)
	}
	
	function notifyAll(command){
		for (const observerFunction of observers){
			observerFunction(command)
		}
	}

	function setState(newState) {
		Object.assign(state, newState)
	}

	function addPlayer(command){ //recebe os dados do usuário e notifica a todos que ele foi adicionado na partida
		const playerId = command.playerId
		const playerName = command.playerName
		const playerBirthday = command.playerBirthday
		const playerEmail = command.playerEmail
		state.players[playerId] = {
			//características do player
			nome_aluno : playerName,
			data_nascimento: playerBirthday,
			email_institucional : playerEmail
		}

		notifyAll({
			type: 'add-player',
			playerId: playerId,
			playerName : playerName,
			playerBirthday: playerBirthday,
			playerEmail : playerEmail
		})
	}

	function removePlayer(command){
		const playerId = command.playerId

		delete state.players[playerId]

		notifyAll({
			type: 'remove-player',
			playerId: playerId,
		})
	}

	function addFruit(command){
		const fruitId = command ? command.fruitId : Math.floor(Math.random() * 10000000)
		const fruitX = command ? command.fruitX : Math.floor(Math.random() * state.screen.width)
		const fruitY = command ? command.fruitY : Math.floor(Math.random() * state.screen.height)

		state.fruits[fruitId] = {
			x: fruitX,
			y: fruitY
		}

		notifyAll({
			type: 'add-fruit',
			fruitId: fruitId,
			fruitX: fruitX,
			fruitY: fruitY
		})
	}

	function removeFruit(command){
		const fruitId = command.fruitId

		delete state.fruits[fruitId]

		notifyAll({
			type: 'remove-fruit',
			fruitId: fruitId
		})
	}

	function movePlayer(command){
		notifyAll(command)
		const acceptedMoves = {
			ArrowUp(player){
				if (player.y - 1 >= 0) {
					player.y = player.y - 1
				}
			},
			ArrowRight(player){
				if (player.x + 1 < state.screen.width) {
					player.x = player.x + 1
				}
			},
			ArrowDown(player){
				if (player.y + 1 < state.screen.height) {
					player.y = player.y + 1
				}
			},
			ArrowLeft(player){
				if (player.x - 1 >= 0) {
					player.x = player.x - 1
				}
			}
			
		}
		const keyPressed = command.keyPressed
		const playerId = command.playerId
		const player = state.players[command.playerId]
		const moveFunction = acceptedMoves[keyPressed]

		if (player && moveFunction){
			moveFunction(player)
			checkForFruitCollision(playerId)
		}
		
	}
	
	function checkForFruitCollision(playerId){
		const player = state.players[playerId]

		for (const fruitId in state.fruits){
			const fruit = state.fruits[fruitId]

			if (player.x === fruit.x && player.y === fruit.y){
				console.log(`COLLISION between ${playerId} and ${fruitId}`)
				removeFruit({fruitId: fruitId})
			}
		}
	}
	
	return {
		addPlayer,
		removePlayer,
		movePlayer,
		addFruit,
		removeFruit,
		setState,
		subscribe,
		start,
		state
	}
		
}
