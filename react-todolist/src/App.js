import "./App.css";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { v4 as uuidv4 } from "uuid";

import Todos from "./Components/Todos";
import CreateTodo from "./Components/CreateTodo";
import { useState } from "react";

function App() {
    const [todos, setTodos] = useState([
        { id: uuidv4(), todo: "Makan", isCompleted: true },
        { id: uuidv4(), todo: "Tidur", isCompleted: false },
    ]);

    const addTodo = (newTodo) => {
        setTodos([...todos, { id: uuidv4(), ...newTodo }]);
        console.log(todos);
    };

    const changeTodo = (id, todo, value) => {
        const newTodos = todos.filter((todo) => todo.id !== id);
        setTodos([...newTodos, { id, todo, isCompleted: value }]);
    };

    const deleteTodo = (id) => {
        const newTodos = todos.filter((todo) => todo.id !== id);
        setTodos(newTodos);
    };

    return (
        <Router>
            <Switch>
                <Route path="/" exact>
                    <Todos
                        todos={todos}
                        changeTodo={changeTodo}
                        deleteTodo={deleteTodo}
                    />
                </Route>
                <Route path="/create">
                    <CreateTodo addTodo={addTodo} />
                </Route>
            </Switch>
        </Router>
    );
}

export default App;
