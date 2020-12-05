import { Component, OnInit } from '@angular/core';
import { TodosService } from 'src/app/services/todos.service';
import { v4 as uuidv4 } from 'uuid';
import { ITodo } from './ITodo';

@Component({
  selector: 'app-todos',
  templateUrl: './todos.component.html',
  styleUrls: ['./todos.component.css']
})
export class TodosComponent implements OnInit {

  todos = []

  constructor(private todosService: TodosService) { }

  deleteTodo($event) {
    this.todosService.deleteTodo($event)
    this.todos = this.todosService.getTodo()
  }

  updateTodo($event) {
    this.todosService.editTodo($event)
    this.todos = this.todosService.getTodo()
  }

  ngOnInit() {
    this.todos = this.todosService.getTodo()
  }

}
