<main class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="table-responsive">
            <table class="table align-middle table-striped table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">ROOM</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">RESERVED FROM</th>
                        <th scope="col">RESERVED TILL</th>
                        <th scope="col">FIRST NAME</th>
                        <th scope="col">LAST NAME</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">EMAIL</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?=$item['room_number']?></td>
                        <td><?=$item['title']?></td>
                        <td><?=$item['reserved_from']?></td>
                        <td><?=$item['reserved_till']?></td>
                        <td><?=$item['first_name']?></td>
                        <td><?=$item['last_name']?></td>
                        <td><?=$item['phone']?></td>
                        <td><?=$item['email']?></td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        </div>
    </div>
</main>