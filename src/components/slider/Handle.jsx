import React from 'react';

function Handle({
  handle: { id, value, percent },
  getHandleProps
}) {
  return (
    <div>
      <div
        style={{
          marginLeft: `calc(${percent}% - 5px)`,
          marginTop: -9,
          zIndex: 2,
          width: 15,
          height: 15,
          border: '2px solid white',
          cursor: 'pointer',
          borderRadius: '50%',
          backgroundColor: 'tomato',
        }}
        {...getHandleProps(id)}
      >
      </div>
      <div className="bet-value">
        {value}
      </div>
    </div>

  )
}

export default Handle;