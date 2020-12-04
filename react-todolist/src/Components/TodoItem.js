import React from "react";

function TodoItem({ id, todo, isCompleted, changeTodo, deleteTodo }) {
    // const [isCompletedState, setIsCompletedState] = useState(isCompleted);
    // const changeStatus = () => {
    //     setIsCompletedState(!isCompletedState)

    // }
    return (
        <div>
            <input
                type="checkbox"
                checked={isCompleted}
                onChange={(e) => changeTodo(id, todo, !isCompleted)}
            />
            {todo}
            <button
                style={{ marginLeft: "15px" }}
                onClick={() => deleteTodo(id)}
            >
                Hapus
            </button>
        </div>
    );
}

export default TodoItem;
