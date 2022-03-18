import React, { useState, useEffect } from 'react'
import moment from 'moment'

const Chat = ({ socket, username, room }) => {

    const [messageSend, setMessageSend] = useState('')
    const [conversation, setConversation] = useState([])

    var today = moment()

    const sendMessage = async() => {

        if(messageSend !== "") {
            const msgObj = {
                room: room,
                sender: username,
                message: messageSend,
                date: today.format('HH:mm:s')
            }
    
            await socket.emit('send_message', msgObj)
            setConversation((list) => [...list, msgObj])
        }
        setMessageSend('')
    }

    useEffect(() => {
        socket.on('receive_message', (msg) => {
            setConversation((list) => [...list, msg])
        })
    }, [socket])

    return (
        <div className="poker-chat--container">
            <div className="poker-chat--heading">
                <h4>{room}</h4>
            </div>

            <div className="poker-chat--conversation">
                {
                    conversation.map((body, i) => {
                        return (
                            <div className={body.sender === username ? "send" : "receive"} key={i}>
                                {
                                    body.sender === username ?
                                    null
                                    :
                                    <p>{body.sender}</p>
                                }
                                <p>{body.message}</p>
                                <small>{body.date}</small>
                            </div>
                        )
                    })
                }
            </div>

            <div className="poker-chat--typing">
                <input type="text" value={messageSend} onChange={(ev) => setMessageSend(ev.target.value)} placeholder="Type a message" />
                <button type="button" onClick={sendMessage}>
                    <img src='./assets/send.png' alt="send" />
                </button>
            </div>
        </div>
    )
}

export default Chat