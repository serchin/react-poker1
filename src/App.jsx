import React, { useState } from 'react'
import io from 'socket.io-client'
import Game from './components/Game'

const socket = io.connect('http://localhost:8001')

const App = () => {

    const rooms = [
        'Room 1',
        'Room 2',
        'Room 3'
    ]

    const [username, setUsername] = useState('')
    const [room, setRoom] = useState('')
    const [joined, setJoined] = useState(false)

    const joinRoom = (val) => {
        setRoom(val)
        socket.emit("join_room", { room: val, username: username })
        setJoined(true)
    }

    if(joined == true) {
        return (
            <Game socket={socket} username={username} room={room} />
        )
    }

    return (
        <div className="poker-roomchoice--wrapper">
            <div className="poker-roomchoice--container">
                <h3 className="title">Join a room</h3>
                <div className="poker-roomchoice--input">
                    <label>User name</label>
                    <input type="text" onChange={(ev) => setUsername(ev.target.value)} />
                </div>
                {
                    rooms.map((curr_room, i) => {
                    return (
                        <div key={i} className="poker-roomchoice--rooms">
                            <label>Room:</label>
                            <button type="button" onClick={() => joinRoom(curr_room)}>{curr_room}</button>
                        </div>
                    )
                    })
                }
            </div>
        </div>
    )
}

export default App