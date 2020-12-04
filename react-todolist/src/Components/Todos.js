import React from "react";
import { Link } from "react-router-dom";
import TodoItem from "./TodoItem";

function Todos({ todos, changeTodo, deleteTodo }) {
    return (
        <div>
            <h1>Todo List</h1>
            <Link to="/create">Tambah Todo</Link>
            <hr />
            <ul>
                {todos.map((todo) => (
                    <TodoItem
                        key={todo.id}
                        id={todo.id}
                        todo={todo.todo}
                        changeTodo={changeTodo}
                        deleteTodo={deleteTodo}
                        isCompleted={todo.isCompleted}
                    />
                ))}
            </ul>
        </div>
    );
}

export default Todos;
