import { Injectable } from '@angular/core';
import { ITodo } from '../components/todos/ITodo';
import { v4 as uuidv4 } from 'uuid';

@Injectable({
  providedIn: 'root'
})
export class TodosService {

  todos: ITodo[] = [
    {id: uuidv4(), todo: "Aktivitas 1", isCompleted: true},
    {id: uuidv4(), todo: "Aktivitas 2", isCompleted: false},
  ]

  getTodo(): ITodo[] {
    return this.todos;
  }

  addTodo(todo: string) {
    this.todos.push({
      id: uuidv4(),
      todo,
      isCompleted: false
    })
  }

  deleteTodo(id: string) {
    const newTodos = this.todos.filter(todo => todo.id !== id)
    this.todos = newTodos
  }

  editTodo(todoParams: ITodo) {
    const deletedTodos = this.todos.filter(todo => todo.id !== todoParams.id)
    this.todos = [...deletedTodos, todoParams]
  }

  constructor() { }
}
