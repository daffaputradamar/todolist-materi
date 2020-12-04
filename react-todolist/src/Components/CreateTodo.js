import React, { useState } from "react";
import { Link, useHistory } from "react-router-dom";

function CreateTodo({ addTodo }) {
    let history = useHistory();
    const [todo, setTodo] = useState("");

    const submitTodo = function () {
        addTodo({ todo, isCompleted: false });
        // console.log(history);
        return history.push("/");
    };

    return (
        <div>
            <Link to="/">Kembali</Link>
            <h1>Tambah Todo List</h1>
            <br />
            <input
                type="text"
                value={todo}
                onChange={(e) => setTodo(e.target.value)}
            />
            <br />
            <button onClick={submitTodo}>Tambah</button>
        </div>
    );
}

export default CreateTodo;
