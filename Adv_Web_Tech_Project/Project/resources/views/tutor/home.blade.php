@extends('layout.main')
@section('content')

<br>
@if($type1 == 'admin')
    <h1 style="color:red" align="center">Welcome, {{$type1}}!</h1>

    <div style="border: 10px solid black;  background-color: rgb(255,0,0); font-size: 20px" align="center" border="5">
        <p>
        <b>Administration Rights</b> means any of the rights of Company to "administer" (as that term is commonly understood in the music industry) Company's Intellectual Property, as set forth in and as limited by the applicable Acquisition Agreement, which may include, but are not necessarily limited to, the rights to publish, administer, exploit (in any and all media of whatsoever nature, whether now known or hereafter devised), deal in, transfer or otherwise dispose of Company’s Intellectual Property or any portion thereof throughout the world, and/or to collect all income, compensation or consideration of whatsoever nature arising out of the exercise of such rights (except only the Writer's Public Performance Share and any other payments made directly by collection organizations, such as SoundExchange, to Record Parties, payable at any time on or after the Closing Date. Administration Rights may also include, without limitation, the non-exclusive rights to use the name, image and/or likeness of, and biographical information concerning, the Writers of a Work and the Record Parties, and to reproduce, print, publish or disseminate the same in any medium or by any method, now or hereafter known, for the purpose of exploiting, administering and otherwise dealing with the Works, or any of them, and to authorize others to exercise any of the foregoing rights, subject to any approval rights or restrictions contained in the Acquisition Agreements.
        </p>
    </div>
@else
    <h1 style="color:green" align="center">Welcome, {{$name1}}! [{{$type1}}]</h1>

    <div style="border: 5px solid black; background-color: 21A3F1; font-size: 20px" align="center" border="5">
        <p>
        “To talk of the size of a thought is odd, perhaps, but to say that someone is thinking big thoughts is not without meaning. "I want you all to come to my birthday party" is a bigger thought than "I want only some of you to come." Bodhicitta is theoretically the biggest thought anyone can think because of the number of beings involved, what it wants them to have, and the length of time it must last before its motivating power dies out. Since the duration of a thought is a variable of the aim, in the sense that the actions motivated by a thought cease when the aim is attained, one can conceive of thoughts that last longer and longer. Bodhicitta necessarily lasts until the last living being reaches the state free of suffering, because it is only then that the aim is finally achieved. This explains the prayer of Samantabhadra at the end of the Gandavyūha section of the Avataṃsaka Sūtra, which the Dalai Lama often invokes: "For as long as space endures may I remain to work for the benefit of living beings.”<b>― Gareth Sparham, Vast as the Heavens, Deep as the Sea: Verses in Praise of Bodhicitta</b>
        </p>
    </div>
@endif

@endsection