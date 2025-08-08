<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use App\Models\Task;
use Illuminate\Http\Request;
use Orchid\Screen\TD;

class TaskScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tasks' => Task::latest()->get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Lista de Tareas';
    }

    /**
     * Displays a description on the user's screen
     * directly under the heading.
     */
    public function description(): ?string
    {
        return "Prueba usando Orchid";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Agregar Tarea')
                ->modal('taskModal')
                ->method('create')
                ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('tasks', [

                TD::make('name'),

                TD::make('Acciones')
                    ->alignRight()
                    ->render(function (Task $task) {
                        return Button::make('Eliminar')
                                ->confirm('Esta seguro de eliminar esta tarea, dicha opcion no se puede revertir.')
                                ->method('delete', ['task' => $task->id])
                                ->icon('trash')
                            .
                            Button::make('Editar')
                                ->method('edit', ['task' => $task->id])
                            ->icon('pencil');
                        }),
            ]),

            Layout::modal('taskModal', Layout::rows([
                Input::make('task.name')
                    ->title('Nombre')
                    ->placeholder('Nombre de la tarea')
                    ->help('Agregamos el nombre de la tarea que necesitamos.'),
            ]))
                ->title('Tarea Nueva')
                ->applyButton('Nueva Tarea'),
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        $request->validate([
            'task.name' => 'required|max:255',
        ]);

        $task = new Task();
        $task->name = $request->input('task.name');
        $task->save();
    }

    /**
     * @param Task $task
     *
     * @return void
     */
    public function delete(Task $task)
    {
        $task->delete();
    }

    /**
     * @param Task $task
     *
     * @return void
     */
    public function edit(Task $task)
    {
        return redirect()->route('platform.task')->with([
            'open' => [
                'taskModal' => [
                    'task' => $task
                ]
            ]
        ]);
    }
}
