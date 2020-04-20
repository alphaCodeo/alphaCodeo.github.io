/******************************************************************************
 * Final project submission for the Data101x: Intro to Data Structures course
 * from the University of Adelaide
 * Social network simulation
******************************************************************************/
// this is the main graph code which you should use
class Node {
    PVector pos;
    String data;

    Node(PVector pos_, String data_) {
        pos  = pos_;
        data = data_;
    }

    void display() {
        stroke(0);
        strokeWeight(1);
        if (dist(mouseX, mouseY, pos.x, pos.y) < 15) {
            fill(0);
            textAlign(LEFT, CENTER);
            textSize(25);
            text(data, (width / 2) + 250, height / 2);
            fill(155, 0, 0);
        } else {
            fill(255, 0, 0);
        }

        ellipse(pos.x, pos.y, 30, 30);
    }
}

class Edge {
    int start;
    int end;
    ArrayList<Node> nodes;

    Edge(int _start, int _end, ArrayList<Node> _nodes) {
        start = _start;
        end   = _end;
        nodes = _nodes;
    }

    void display() {
        stroke(0);
        strokeWeight(1);
        line(nodes.get(start).pos.x, nodes.get(start).pos.y, nodes.get(end).pos.x, nodes.get(end).pos.y);
    }
}

class Graph {
    ArrayList<Node> nodes;
    ArrayList<Edge> edges;

    Graph() {
        nodes = new ArrayList<Node>();
       edges = new ArrayList<Edge>();
    }

    void addNode(Node node) {
        nodes.add(node);
    }

    void addEdge(Edge edge) {
        edges.add(edge);
    }

    void display() {
        for (int i = 0; i < nodes.size(); i++) {
            nodes.get(i).display();
        }

        for (int i = 0; i < edges.size(); i++) {
            edges.get(i).display();
        }
    }
}

class Person extends Graph {
    Person(String name) {
        addNode(new Node(new PVector(), name));
    }
}

// all this is setup code, if you want to use my program just change it to add
// your own people, friends and edges(connections)
ArrayList<Person> People;
String[] Names  = {"Mark Zuckerberg", "John Smith", "Vladimir Putin", "Steve Rogers"};
String Mode     = "main";

void setup() {
    size(1280, 720);
    People = new ArrayList<Person>();

    // add a new person for each item in Names
    for (int i = 0; i < Names.length; i++) {
        People.add(new Person(Names[i]));
    }

    // add all of the people to all of the other people's friend list
    for (int i = 0; i < People.size(); i++) {
        for (int j = 0; j < Names.length; j++) {
            if (Names[j] != People.get(i).nodes.get(0).data) {
                People.get(i).addNode(new Node(new PVector(), Names[j]));
                People.get(i).addEdge(new Edge(i, j, People.get(i).nodes));
            }
        }
    }

    // loop through People and arrange all the nodes(friends) in a circle
    for (int i = 0; i < People.size(); i++) {
        for (int j = 0; j < People.get(i).nodes.size(); j++) {
            People.get(i).nodes.get(j).pos.x = (cos(radians(j * (360 / (float)People.get(i).nodes.size()))) * 200) + (width / 2);
            People.get(i).nodes.get(j).pos.y = (sin(radians(j * (360 / (float)People.get(i).nodes.size()))) * 200) + (height / 2);
        }
    }
}

// all this is also not needed if you're just using the code for the friend
// storage structure, it's just display code
void draw() {
    background(200);
    cursor(ARROW);
    // show buttons for each person
    if (Mode == "main") {
        for (int i = 0; i < People.size(); i++) {
            float x = (i * (width / People.size())) + 50;
            float w = (width / People.size()) - 100;

            if (mouseX > x && mouseY > height / 2 && mouseX < x + w && mouseY < (width / 2) + 200) {
                fill(0);
                textAlign(CENTER);
                textSize(25);
                text(People.get(i).nodes.get(0).data, width/2, 200);
                fill(0, 0, 50);
                cursor(HAND);
                if (mousePressed) {
                    Mode = i.toString();
                }
            } else {
                fill(0, 0, 100);
            }
            noStroke();
            rect(x, height/2, w, 200, 20);
        }
    // show friends graph for respective person
    } else {
        People.get(parseInt(Mode)).display();

        textSize(25);
        fill(0);
        textAlign(CENTER, CENTER);
        text("Press B to go back", width / 2, 100);

        if (keyPressed) {
            if (key == 'b') {
                Mode = "main";
            }
        }
    }
}
