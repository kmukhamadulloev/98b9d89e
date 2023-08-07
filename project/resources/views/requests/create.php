<header class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-3 text-end">
            <a href="/" class="btn btn-outline-danger">Назад</a>
        </div>
    </div>
</header>

<main class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php foreach($errors as $error): ?>
                <div class="alert alert-<?=$error['type']?>">
                    ERROR: <?=$error['message']?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="/add">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First name <span style="color: red;">*</span>:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required placeholder="John" value="<?=$items['request']['first_name'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last name <span style="color: red;">*</span>:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required placeholder="Doe" value="<?=$items['request']['last_name'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Middle name:</label>
                    <input type="text" class="form-control" name="middle_name" id="middle_name" required placeholder="Clayton" value="<?=$items['request']['middle_name'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone <span style="color: red;">*</span>:</label>
                    <input type="text" class="form-control" name="phone" required id="phone" placeholder="+7999999999" value="<?=$items['request']['phone'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Email <span style="color: red;">*</span>:</label>
                    <input type="text" class="form-control" name="email" required id="email" placeholder="example@mail.com" value="<?=$items['request']['email'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Room <span style="color: red;">*</span>:</label>
                    <select class="form-select" id="room_id" required name="room_id" aria-label="Default select example">
                        <?php foreach($items['rooms'] as $item): ?>
                            <option value="<?=$item['id']?>" <?=(isset($items['request']['room_id']) && $items['request']['room_id'] == $item['id']) ? "selected" : ""?>><?=$item['room_number'] . " - " .$item['title']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">From <span style="color: red;">*</span>:</label>
                    <input type="datetime-local" class="form-control" name="reserved_from" required id="reserved_from" value="<?=$items['request']['reserved_from'] ?? ""?>"/>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Till <span style="color: red;">*</span>:</label>
                    <input type="datetime-local" class="form-control" name="reserved_till" required id="reserved_till" value="<?=$items['request']['reserved_till'] ?? ""?>"/>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-primary btn-lg btn-full">Request</button>
                </div>
            </form>
        </div>
    </div>
</main>