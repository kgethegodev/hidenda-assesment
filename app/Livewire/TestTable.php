<?php

namespace App\Livewire;

use Livewire\Component;

class TestTable extends Component
{
    public $tests, $email, $telephone_number, $test_id, $update_test = false, $add_test = false;
    protected $listeners = [
        'deleteTestListener' => 'deleteTest',
    ];

    protected $rules = [
        'email' => ['required', 'email'],
        'telephone_number' => ['required', 'numeric', 'digits:11', 'starts_with:07'],
    ];

    public function resetFields()
    {
        $this->email = "";
        $this->telephone_number = "";
    }
    public function render()
    {
        $this->tests = \App\Models\TestTable::select('id', 'email', 'telephone_number')->get();
        return view('livewire.test-table');
    }

    public function addTest()
    {
        $this->resetFields();
        $this->add_test = true;
        $this->update_test = false;
    }

    public function storeTest()
    {
        $this->validate();
        try {
            info("Do we get here 1");

            \App\Models\TestTable::create([
                'email' => $this->email,
                'telephone_number' => $this->telephone_number,
            ]);
            info("Do we get here 2");
            session()->flash('message', 'Test added successfully.');
            $this->resetFields();
            $this->add_test = false;
        } catch (\Exception $e) {
            info($e->getMessage());
            session()->flash('error', $e->getMessage());
        }
    }

    public function editTest($test_id)
    {
        try {
            $test = \App\Models\TestTable::query()->findOrFail($test_id);
            if (!$test) {
                session()->flash('message', 'Test not found.');
            } else {
                $this->email = $test->email;
                $this->telephone_number = $test->telephone_number;
                $this->test_id = $test->id;
                $this->update_test = true;
                $this->add_test = false;
            }
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function updateTest() {
        $this->validate();
        try {
            \App\Models\TestTable::query()->where('id', $this->test_id)->update([
                'email' => $this->email,
                'telephone_number' => $this->telephone_number,
            ]);
            session()->flash('message', 'Test updated successfully.');
            $this->resetFields();
            $this->update_test = false;
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function cancelTest()
    {
        $this->add_test = false;
        $this->update_test = false;
        $this->resetFields();
    }

    public function deleteTest($test_id) {
        try {
            $test = \App\Models\TestTable::query()->findOrFail($test_id)->delete();
            session()->flash('message', 'Test deleted successfully.');
            $this->resetFields();
            $this->update_test = false;
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
