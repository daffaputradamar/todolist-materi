import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TodosService } from 'src/app/services/todos.service';

@Component({
  selector: 'app-create-todo',
  templateUrl: './create-todo.component.html',
  styleUrls: ['./create-todo.component.css']
})
export class CreateTodoComponent implements OnInit {

  todo: string = ""

  constructor(private todosService: TodosService, private router: Router) { }

  ngOnInit() {
  }

  addTodo() {
    this.todosService.addTodo(this.todo);
    this.router.navigate(['/'])
  }

}
